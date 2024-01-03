<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\CapaianPembelajaran;
use Illuminate\Http\Request;

class CapaianPembelajaranController extends Controller
{
    public function index()
    {
        $capaianPembelajaran = CapaianPembelajaran::orderBy('created_at', 'desc')->get();

        $data = [
            'active' => 'capaian-pembelajaran',
            'capaianPembelajaran' => $capaianPembelajaran
        ];

        return view('guru.capaian-pembelajaran.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'capaian-pembelajaran'
        ];

        return view('guru.capaian-pembelajaran.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:capaian_pembelajarans,title',
            'body' => 'required'
        ], [
            'title.required' => 'Judul harus diisi',
            'title.unique' => 'Judul sudah dipakai',
            'body.required' => 'Isi harus diisi'
        ]);

        CapaianPembelajaran::create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return to_route('guru.capaian.pembelajaran')->with('success', 'Berhasil Menambah Data');
    }

    public function edit($id)
    {
        $capaianPembelajaran = CapaianPembelajaran::findorfail($id);

        $data = [
            'active' => 'capaian-pembelajaran',
            'capaianPembelajaran' => $capaianPembelajaran
        ];

        return view('guru.capaian-pembelajaran.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ], [
            'title.required' => 'Judul harus diisi',
            'body.required' => 'Isi harus diisi'
        ]);

        $capaianPembelajaran = CapaianPembelajaran::findorfail($id);

        if ($capaianPembelajaran->title != $request->title) {
            $request->validate([
                'title' => 'unique:capaian_pembelajarans,title',
            ], [
                'title.unique' => 'Judul sudah dipakai',
            ]);
        }

        CapaianPembelajaran::where('id', $id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return to_route('guru.capaian.pembelajaran')->with('success', 'Berhasil Mengubah Data');
    }

    public function destroy(string $id)
    {
        try {
            $capaianPembelajaran = CapaianPembelajaran::with('files')->findOrFail($id); // Temukan Capaian Pembelajaran yang akan dihapus

            foreach ($capaianPembelajaran->files as $file) {
                if (file_exists(public_path($file->files)) && !is_dir($file->files)) {
                    unlink(public_path($file->files));
                }

                $file->delete();
            }

            // Hapus Capaian Pembelajaran dari tabel Capaian Pembelajaran
            $capaianPembelajaran->delete();

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
