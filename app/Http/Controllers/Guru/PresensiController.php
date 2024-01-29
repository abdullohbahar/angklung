<?php

namespace App\Http\Controllers\Guru;

use App\Models\Presensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresensiController extends Controller
{
    public function index()
    {
        $presensis = Presensi::orderBy('tanggal', 'desc')->get();

        $data = [
            'active' => 'presensi',
            'presensis' => $presensis
        ];

        return view('guru.presensi.index', $data);
    }

    public function store()
    {
        $tanggal = date('Y-m-d');

        $presensi = Presensi::orderBy('tanggal', 'desc')->first();

        if ($presensi) {
            if ($presensi->tanggal == $tanggal) {
                return response()->json([
                    'message' => 'Presensi hari ini sudah ada',
                    'code' => 302,
                    'error' => false
                ]);
            }
        }

        $joinCode = Str::upper(Str::random(6));

        Presensi::create([
            'tanggal' => $tanggal,
            'kode' => $joinCode
        ]);

        return response()->json([
            'message' => 'Berhasil membuat presensi',
            'code' => 200,
            'error' => false
        ]);
    }

    public function destroy($id)
    {
        try {
            $presensi = Presensi::findOrFail($id); // Temukan siswa yang akan dihapus

            // Hapus Siswa dari tabel Siswa
            $presensi->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Soal',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Soal',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
