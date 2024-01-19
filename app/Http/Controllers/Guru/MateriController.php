<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\AktivitasBelajar;
use App\Models\Materi;
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
            'deskripsi' => 'required',
        ], [
            'video.required' =>  'Embed Youtube Harus Diisi',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
        ]);

        $no = Materi::where('aktivitas_belajar_id', $request->idAktivitasBelajar)->orderBy('no', 'desc')->first();

        if ($no) {
            $no = $no->no += 1;
        } else {
            $no = 1;
        }

        Materi::create([
            'no' => $no,
            'video' => $request->video,
            'deskripsi' => $request->deskripsi,
            'aktivitas_belajar_id' => $request->idAktivitasBelajar
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Materi');
    }

    public function edit($id)
    {
        $materi = Materi::findorfail($id);

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
