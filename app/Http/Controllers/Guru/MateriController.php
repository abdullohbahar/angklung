<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\AktivitasBelajar;
use App\Models\EksplorasiDiMateri;
use App\Models\KeteranganSesudahMateri;
use App\Models\Materi;
use App\Models\PertanyaanMateri;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index($id)
    {
        $aktivitasBelajar = AktivitasBelajar::with([
            'materi' => function ($query) {
                $query->orderBy('no', 'asc');
            }
        ])->findorfail($id);

        $data = [
            'active' => 'aktivitas-belajar',
            'aktivitasBelajar' => $aktivitasBelajar
        ];

        return view('guru.aktivitas-belajar.materi.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required',

        ], [
            'video.required' =>  'Embed Youtube Harus Diisi',

        ]);

        $no = Materi::where('aktivitas_belajar_id', $request->idAktivitasBelajar)->orderBy('no', 'desc')->first();

        if ($no) {
            $no = $no->no += 1;
        } else {
            $no = 1;
        }

        $materi = Materi::create([
            'no' => $no,
            'video' => $request->video,
            'deskripsi' => $request->deskripsi ?? '-',
            'aktivitas_belajar_id' => $request->idAktivitasBelajar
        ]);

        foreach ($request->pertanyaan as $index => $pertanyaan) {
            PertanyaanMateri::create([
                'materi_id' => $materi->id,
                'pertanyaan' => $pertanyaan,
                'nomor' => $index + 1
            ]);
        }

        if ($request->eksplorasi) {
            EksplorasiDiMateri::create([
                'materi_id' => $materi->id,
                'embed' => $request->eksplorasi
            ]);
        }

        if ($request->keterangan_materi) {
            KeteranganSesudahMateri::create([
                'materi_id' => $materi->id,
                'keterangan' => $request->keterangan_materi
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil Menambah Materi');
    }

    public function edit($id)
    {
        $materi = Materi::with([
            'manyPertanyaanRiwayat' => function ($query) {
                $query->orderBy('nomor', 'asc');
            },
            'oneKeteranganSesudahMateri',
            'oneEksplorasiDiMateri'
        ])->findorfail($id);

        $data = [
            'active' => 'aktivitas-belajar',
            'materi' => $materi
        ];

        return view('guru.aktivitas-belajar.materi.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'video' => 'required',
            'deskripsi' => 'required',
        ], [
            'video.required' =>  'Embed Youtube Harus Diisi',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
        ]);

        $materi = Materi::with('aktivitasBelajar')->findorfail($id);

        Materi::where('id', $id)->update([
            'video' => $request->video,
            'deskripsi' => $request->deskripsi,
        ]);

        $pertanyaanMateri = PertanyaanMateri::where('materi_id', $id)->get();

        foreach ($pertanyaanMateri as $pertanyaanMateri) {
            $pertanyaanMateri->delete();
        }

        foreach ($request->pertanyaan as $index => $pertanyaan) {
            PertanyaanMateri::create([
                'materi_id' => $materi->id,
                'pertanyaan' => $pertanyaan,
                'nomor' => $index + 1
            ]);
        }

        if ($request->keterangan_materi) {
            KeteranganSesudahMateri::updateorcreate([
                'materi_id' => $materi->id,
            ], [
                'keterangan' => $request->keterangan_materi
            ]);
        }

        if ($request->eksplorasi) {
            EksplorasiDiMateri::updateorcreate([
                'materi_id' => $materi->id,
            ], [
                'embed' => $request->eksplorasi
            ]);
        }

        return to_route('guru.materi', $materi->aktivitasBelajar->id)->with('success', 'Berhasil Mengubah Materi');
    }

    public function destroy($id)
    {
        try {
            $materi = Materi::findOrFail($id); // Temukan Capaian Pembelajaran yang akan dihapus

            // urutkan nomor ulang
            Materi::where('aktivitas_belajar_id', $materi->aktivitas_belajar_id)
                ->where('no', '>', $materi->no)
                ->decrement('no');

            // Hapus Capaian Pembelajaran dari tabel Capaian Pembelajaran
            $materi->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Data',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Data',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
