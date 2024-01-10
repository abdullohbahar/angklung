<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\AktivitasBelajar;
use Illuminate\Http\Request;

class AktivitasBelajarController extends Controller
{
    public function index()
    {
        $aktivitasBelajar = AktivitasBelajar::orderBy('created_at')->get();

        $data = [
            'active' => 'aktivitas-belajar',
            'aktivitasBelajar' => $aktivitasBelajar
        ];

        return view('guru.aktivitas-belajar.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'aktivitas-belajar',
        ];

        return view('guru.aktivitas-belajar.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:aktivitas_belajars,title',
            'thumbnail' => 'required'
        ], [
            'title' => 'Judul Harus Diisi',
            'thumbnail' => 'Thumbnail Harus Diisi'
        ]);

        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = $request->title . '-' . date('His') . "." . $file->getClientOriginalExtension();
            $location = 'thumbnail-aktivitas-belajar/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $thumbnail = $filepath;
        } else {
            $thumbnail = './guest-assets/informasi-pengembang.svg';
        }

        AktivitasBelajar::create([
            'title' => $request->title,
            'thumbnail' => $thumbnail
        ]);

        return to_route('guru.aktivitas.belajar.siswa')->with('success', 'Berhasil menambah aktivitas belajar');
    }

    public function edit($id)
    {
        $aktivitasBelajar = AktivitasBelajar::findorfail($id);


        $data = [
            'active' => 'aktivitas-belajar',
            'aktivitasBelajar' => $aktivitasBelajar
        ];

        return view('guru.aktivitas-belajar.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required'
        ], [
            'title' => 'Judul Harus Diisi',
            'thumbnail' => 'Thumbnail Harus Diisi'
        ]);

        $aktivitasBelajar = AktivitasBelajar::findorfail($id);

        if ($aktivitasBelajar->title != $request->title) {
            $request->validate([
                'title' => 'unique:aktivitas_belajars,title'
            ]);
        }

        if ($request->file('thumbnail')) {
            if (file_exists(public_path($aktivitasBelajar->thumbnail)) && !is_dir($aktivitasBelajar->thumbnail)) {
                unlink(public_path($aktivitasBelajar->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = $request->title . '-' . date('His') . "." . $file->getClientOriginalExtension();
            $location = 'thumbnail-aktivitas-belajar/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $thumbnail = $filepath;
        } else {
            $thumbnail = $aktivitasBelajar->thumbnail;
        }

        AktivitasBelajar::where('id', $id)->update([
            'thumbnail' => $thumbnail,
            'title' => $request->title
        ]);

        return to_route('guru.aktivitas.belajar.siswa')->with('success', 'Berhasil mengubah aktivitas belajar');
    }

    public function destroy(string $id)
    {
        try {
            $aktivitasBelajar = AktivitasBelajar::with('materi', 'aktivitas')->findOrFail($id); // Temukan siswa yang akan dihapus

            // Hapus foto gambar jika ada
            if (file_exists(public_path($aktivitasBelajar->thumbnail)) && !is_dir($aktivitasBelajar->thumbnail)) {
                unlink(public_path($aktivitasBelajar->thumbnail));
            }

            foreach ($aktivitasBelajar->materi as $materi) {
                $materi->delete();
            }

            $aktivitasBelajar->aktivitas->delete();

            // Hapus Siswa dari tabel Siswa
            $aktivitasBelajar->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Aktivitas Belajar',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Aktivitas Belajar',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
