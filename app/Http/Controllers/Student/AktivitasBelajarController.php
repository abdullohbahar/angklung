<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use App\Models\AktivitasBelajar;
use App\Models\EksplorasiAktivitasBelajar;
use App\Models\JawabanPertanyaanMateri;
use App\Models\Materi;
use App\Models\MateriEksplorasi;
use App\Models\RiwayatPengerjaanAktivitas;
use Illuminate\Http\Request;

class AktivitasBelajarController extends Controller
{
    public function index()
    {
        $activities = AktivitasBelajar::orderBy('created_at', 'asc')->get();

        $data = [
            'activities' => $activities
        ];

        return view('student.main-menu.aktivitas-belajar', $data);
    }

    public function cekCode(Request $request)
    {
        $aktivitasBelajar = AktivitasBelajar::where('title', $request->title)
            ->first();

        if ($request->code != $aktivitasBelajar->join_code) {
            return redirect()->back()->with('error', 'Kode Salah!');
        } else {
            return to_route('materi', [
                'title' => $request->title,
                'no' => $request->no
            ]);
        }
    }

    public function aktivitas($id)
    {
        $aktivitas = Aktivitas::where('aktivitas_belajar_id', $id)->first();

        if (!$aktivitas) {
            return redirect()->back()->with('error', 'Belum ada aktivitas belajar');
        }

        $data = [
            'aktivitas' => $aktivitas
        ];

        return view('student.aktivitas.index', $data);
    }

    public function materi(Request $request, $title, $no)
    {
        $userID = auth()->user()->id;

        $aktivitasBelajar = AktivitasBelajar::with([
            'materiHasOne' => function ($query) use ($no, $userID) {
                $query->with([
                    'manyPertanyaanRiwayat' => function ($query) use ($userID) {
                        $query->with('jawaban', function ($query) use ($userID) {
                            $query->where('users_id', $userID);
                        })
                            ->orderBy('nomor', 'asc');
                    },
                    'oneEksplorasiDiMateri'
                ])->where('no', $no);
            }
        ])
            ->where('title', $title)
            ->first();

        $eksplorasi = AktivitasBelajar::with([
            'materiHasOne' => function ($query) use ($no, $userID) {
                $query->with([
                    'oneEksplorasiDiMateri'
                ])->where('no', $no - 1);
            }
        ])
            ->where('title', $title)
            ->first();

        if ($eksplorasi->materiHasOne?->oneEksplorasiDiMateri != null) {
            return to_route('student.aktivitas.belajar.eksplorasi', [
                'no' => $no,
                'title' => $title,
                'aktivitasBelajarID' => $aktivitasBelajar->id
            ]);
        }

        if (!$aktivitasBelajar->materiHasOne && $no == 1) {
            return redirect()->back()->with('error', 'Belum ada materi');
        }

        if ($aktivitasBelajar->no != 1) {
            $getMateris = AktivitasBelajar::with('materi.riwayatPengerjaanAktivitas')
                ->where('no', $aktivitasBelajar->no - 1)
                ->first();
            foreach ($getMateris->materi as $getMateri) {
                if ($getMateri->riwayatPengerjaanAktivitas == null) {
                    return redirect()->back()->with('error', 'Harap selesaikan aktifitas sebelumnya terlebih dahulu');
                }
            }
        }

        $materiID = $aktivitasBelajar->materiHasOne?->id;

        if ($materiID == null) {
            return view('student.materi.congratulation');
        }

        $userID = auth()->user()->id;

        $riwayatPengerjaanAktivitas = RiwayatPengerjaanAktivitas::where('materi_id', $materiID)
            ->where('users_id', $userID)->first();

        if ($riwayatPengerjaanAktivitas) {
            $answer = $riwayatPengerjaanAktivitas->jawaban;
        } else {
            $answer = '';
        }

        $data = [
            'aktivitasBelajar' => $aktivitasBelajar,
            'answer' => $answer,
            'no' => $no,
            'title' => $title
        ];

        return view('student.materi.index', $data);
    }

    public function storeMateri(Request $request, $materiID, $no, $aktivitasBelajarID)
    {
        $userID = auth()->user()->id;

        // $riwayatPengerjaanAktivitas = RiwayatPengerjaanAktivitas::where('materi_id', $materiID)
        //     ->where('users_id', $userID)->first();

        // if ($riwayatPengerjaanAktivitas) {
        //     $riwayatPengerjaanAktivitas->jawaban = $request->jawaban ?? '-';
        //     $riwayatPengerjaanAktivitas->save();
        // } else {
        //     RiwayatPengerjaanAktivitas::create([
        //         'jawaban' => $request->jawaban,
        //         'materi_id' => $materiID,
        //         'users_id' => auth()->user()->id
        //     ]);
        // }

        if ($request->has('jawaban_pertanyaan_materi')) {
            foreach ($request->jawaban_pertanyaan_materi as $index => $jawaban) {
                JawabanPertanyaanMateri::where('pertanyaan_materi_id', $request->pertanyaan_materi_id[$index])
                    ->delete();

                JawabanPertanyaanMateri::create([
                    'users_id' => $userID,
                    'pertanyaan_materi_id' => $request->pertanyaan_materi_id[$index],
                    'jawaban' => $jawaban
                ]);
            }
        }

        $materi = Materi::with('aktivitasBelajar', 'oneKeteranganSesudahMateri')
            ->where('no', $no)
            ->where('aktivitas_belajar_id', $aktivitasBelajarID)
            ->first()
            ->oneKeteranganSesudahMateri ?? null;

        if ($materi != null) {
            return to_route('keterangan.setelah.materi', [
                'no' => $no,
                'aktivitasBelajarID' => $aktivitasBelajarID
            ]);
        }

        $materi = Materi::with('aktivitasBelajar', 'oneKeteranganSesudahMateri', 'oneEksplorasiDiMateri')
            ->where('aktivitas_belajar_id', $aktivitasBelajarID)->where('no', $no + 1)
            ->first();

        if ($materi) {
            return to_route('materi', [
                'title' => $materi->aktivitasBelajar->title,
                'no' => $no + 1
            ]);
        } else {
            return view('student.materi.congratulation');
        }
    }

    public function keteranganSetelahMateri($no, $aktivitasBelajarID)
    {
        $title = Materi::with('aktivitasBelajar', 'oneKeteranganSesudahMateri')
            ->where('aktivitas_belajar_id', $aktivitasBelajarID)
            ->first()
            ->aktivitasBelajar
            ->title ?? 0;

        $aktivitasBelajarID = Materi::with('aktivitasBelajar', 'oneKeteranganSesudahMateri')
            ->where('aktivitas_belajar_id', $aktivitasBelajarID)
            ->first()
            ->aktivitasBelajar
            ->id ?? 0;

        $keterangan = Materi::with('aktivitasBelajar', 'oneKeteranganSesudahMateri')
            ->where('no', $no)
            ->where('aktivitas_belajar_id', $aktivitasBelajarID)
            ->first()
            ->oneKeteranganSesudahMateri
            ->keterangan ?? 0;

        $data = [
            'no' => $no,
            'title' => $title,
            'aktivitasBelajarID' => $aktivitasBelajarID,
            'keterangan' => $keterangan
        ];

        return view('student.materi.keterangan', $data);
    }

    public function eksplorasi($title, $no, $aktivitasBelajarID)
    {
        $eksplorasi = Materi::with([
            'oneEksplorasiDiMateri'
        ])
            ->where('aktivitas_belajar_id', $aktivitasBelajarID)
            ->where('no', $no - 1)
            ->first();

        $data = [
            'title' => $title,
            'no' => $no,
            'eksplorasi' => $eksplorasi
        ];

        return view('student.materi.eksplorasi', $data);
    }
}
