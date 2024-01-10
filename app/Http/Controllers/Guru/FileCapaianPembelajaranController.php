<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\CapaianPembelajaran;
use App\Models\CapaianPembelajaranFile;
use Illuminate\Http\Request;

class FileCapaianPembelajaranController extends Controller
{
    public function index($id)
    {
        $capaianPembelajaran = CapaianPembelajaran::with('files')->findorfail($id);

        $data = [
            'active' => 'capaian-pembelajaran',
            'capaianPembelajaran' => $capaianPembelajaran
        ];

        return view('guru.file-capaian-pembelajaran.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'name' => 'required'
        ], [
            'file.required' => 'File Harus Diisi',
            'name.required' => 'Nama File Harus Diisi'
        ]);

        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = $request->name . '-' . date('His') . "." . $file->getClientOriginalExtension();
            $location = 'capaian-pembelajaran/file/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $file = $filepath;
        } else {
            $file = '';
        }

        CapaianPembelajaranFile::create([
            'files' => $file,
            'name' => $request->name,
            'capaian_pembelajaran_id' => $request->idCapaianPembelajaran,
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengunggah File');
    }

    public function destroy(string $id)
    {
        try {
            $capaianPembelajaran = CapaianPembelajaranFile::findOrFail($id); // Temukan siswa yang akan dihapus

            // Hapus files gambar jika ada
            if (file_exists(public_path($capaianPembelajaran->files)) && !is_dir($capaianPembelajaran->files)) {
                unlink(public_path($capaianPembelajaran->files));
            }

            // Hapus Siswa dari tabel Siswa
            $capaianPembelajaran->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus File',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus File',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
