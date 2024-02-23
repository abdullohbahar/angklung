<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Models\PenilaianEssay;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PenilaianEssayController extends Controller
{
    public function index()
    {
        $penilaian = PenilaianEssay::orderBy('nomor_soal', 'asc')->get();

        $data = [
            'active' => 'penilaian-essay',
            'penilaian' => $penilaian
        ];

        return view('guru.penilaian-essay.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'penilaian-essay',
        ];

        return view('guru.penilaian-essay.create', $data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $penilaian = new PenilaianEssay();

            // cek apakah sudah ada penilaian atau belum
            if (!$penilaian->first()) {
                $nomor = 1;
            } else {
                $nomor = $penilaian->orderBy('nomor_soal', 'desc')->first()->nomor_soal + 1;
            }

            $penilaian->create([
                'nomor_soal' => $nomor,
                'soal' => $request->body,
            ]);

            DB::commit();

            return to_route('guru.penilaian.essay')->with('success', 'Berhasil menambah Soal');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return to_route('guru.create.penilaian.essay')->with('error', 'Gagal menambah Soal, harap coba lagi')->withInput();
        }
    }

    public function edit($id)
    {
        $penilaian = PenilaianEssay::findOrFail($id);

        $data = [
            'penilaian' => $penilaian,
            'active' => 'penilaian'
        ];

        return view('guru.penilaian-essay.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            PenilaianEssay::where('id', $id)->update([
                'soal' => $request->body,
            ]);

            DB::commit();

            return to_route('guru.penilaian.essay')->with('success', 'Berhasil mengubah soal');
        } catch (\Throwable $th) {
            DB::rollBack();
            return to_route('guru.edit.penilaian.essay')->with('error', 'Gagal mengubah soal, harap coba lagi')->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $penilaian = PenilaianEssay::findOrFail($id); // Temukan siswa yang akan dihapus

            // Hapus Siswa dari tabel Siswa
            $penilaian->delete();

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
