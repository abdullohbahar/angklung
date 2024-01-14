<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Alasan;
use App\Models\Penilaian;
use App\Models\PilihanJawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::orderBy('nomor', 'asc')->get();

        $data = [
            'active' => 'penilaian',
            'penilaian' => $penilaian
        ];

        return view('guru.penilaian.index', $data);
    }

    public function create()
    {

        $data = [
            'active' => 'penilaian',
        ];

        return view('guru.penilaian.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'jawabanA' => 'required',
            'jawabanB' => 'required',
            'jawabanC' => 'required',
            'jawabanD' => 'required',
            'jawabanSoal' => 'required',
            'alasanA' => 'required',
            'alasanB' => 'required',
            'alasanC' => 'required',
            'alasanD' => 'required',
            'jawabanAlasan' => 'required',
        ], [
            'body.required' => 'Soal harus diisi',
            'jawabanA.required' => 'Jawaban A harus diisi',
            'jawabanB.required' => 'Jawaban B harus diisi',
            'jawabanC.required' => 'Jawaban C harus diisi',
            'jawabanD.required' => 'Jawaban D harus diisi',
            'jawabanSoal.required' => 'Jawaban Soal harus diisi',
            'alasanA.required' => 'Alasan A harus diisi',
            'alasanB.required' => 'Alasan B harus diisi',
            'alasanC.required' => 'Alasan C harus diisi',
            'alasanD.required' => 'Alasan D harus diisi',
            'jawabanAlasan.required' => 'Kunci Jawaban Alasan harus diisi',
        ]);

        try {
            DB::beginTransaction();

            $penilaian = new Penilaian();

            // cek apakah sudah ada penilaian atau belum
            if (!$penilaian->first()) {
                $nomor = 1;
            } else {
                $nomor = $penilaian->orderBy('nomor', 'desc')->first()->nomor + 1;
            }

            $createPenilaian = $penilaian->create([
                'nomor' => $nomor,
                'soal' => $request->body,
                'kunci_jawaban' => $request->jawabanSoal,
                'kunci_alasan' => $request->jawabanAlasan,
            ]);

            PilihanJawaban::create([
                'penilaian_id' => $createPenilaian->id,
                'a' => $request->jawabanA,
                'b' => $request->jawabanB,
                'c' => $request->jawabanC,
                'd' => $request->jawabanD,
            ]);

            Alasan::create([
                'penilaian_id' => $createPenilaian->id,
                'a' => $request->alasanA,
                'b' => $request->alasanB,
                'c' => $request->alasanC,
                'd' => $request->alasanD,
            ]);

            DB::commit();

            return to_route('guru.penilaian')->with('success', 'Berhasil menambah Soal');
        } catch (\Throwable $th) {
            DB::rollBack();
            return to_route('guru.create.penilaian')->with('error', 'Gagal menambah Soal, harap coba lagi')->withInput();
        }
    }

    public function edit($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $data = [
            'penilaian' => $penilaian,
            'active' => 'penilaian'
        ];

        return view('guru.penilaian.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'body' => 'required',
            'jawabanA' => 'required',
            'jawabanB' => 'required',
            'jawabanC' => 'required',
            'jawabanD' => 'required',
            'jawabanSoal' => 'required',
            'alasanA' => 'required',
            'alasanB' => 'required',
            'alasanC' => 'required',
            'alasanD' => 'required',
            'jawabanAlasan' => 'required',
        ], [
            'body.required' => 'Soal harus diisi',
            'jawabanA.required' => 'Jawaban A harus diisi',
            'jawabanB.required' => 'Jawaban B harus diisi',
            'jawabanC.required' => 'Jawaban C harus diisi',
            'jawabanD.required' => 'Jawaban D harus diisi',
            'jawabanSoal.required' => 'Jawaban Soal harus diisi',
            'alasanA.required' => 'Alasan A harus diisi',
            'alasanB.required' => 'Alasan B harus diisi',
            'alasanC.required' => 'Alasan C harus diisi',
            'alasanD.required' => 'Alasan D harus diisi',
            'jawabanAlasan.required' => 'Kunci Jawaban Alasan harus diisi',
        ]);

        try {
            DB::beginTransaction();

            Penilaian::where('id', $id)->update([
                'soal' => $request->body,
                'kunci_jawaban' => $request->jawabanSoal,
                'kunci_alasan' => $request->jawabanAlasan,
            ]);

            PilihanJawaban::where('penilaian_id', $id)->update([
                'a' => $request->jawabanA,
                'b' => $request->jawabanB,
                'c' => $request->jawabanC,
                'd' => $request->jawabanD,
            ]);

            Alasan::where('penilaian_id', $id)->update([
                'a' => $request->alasanA,
                'b' => $request->alasanB,
                'c' => $request->alasanC,
                'd' => $request->alasanD,
            ]);

            DB::commit();

            return to_route('guru.penilaian')->with('success', 'Berhasil mengubah soal');
        } catch (\Throwable $th) {
            DB::rollBack();
            return to_route('guru.edit.penilaian')->with('error', 'Gagal mengubah soal, harap coba lagi')->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $penilaian = Penilaian::findOrFail($id); // Temukan siswa yang akan dihapus

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
