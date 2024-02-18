<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use App\Models\AktivitasBelajar;
use App\Models\JawabanPertanyaanMateri;
use App\Models\Materi;
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
                    }
                ])->where('no', $no);
            }
        ])
            ->where('title', $title)
            ->first();

        if (!$aktivitasBelajar->materiHasOne) {
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

        $materiID = $aktivitasBelajar->materiHasOne->id;
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

        if ($request->has('jawaban_pertanyaan_materi')) {
            foreach ($request->jawaban_pertanyaan_materi as $index => $jawaban) {
                JawabanPertanyaanMateri::create([
                    'users_id' => $userID,
                    'pertanyaan_materi_id' => $request->pertanyaan_materi_id[$index],
                    'jawaban' => $jawaban
                ]);
            }
        }

        $materi = Materi::with('aktivitasBelajar', 'oneKeteranganSesudahMateri')
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
}
