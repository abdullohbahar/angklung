<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\RiwayatPenilaian;
use Illuminate\Http\Request;

class PenilaianStudentController extends Controller
{
    public function index($no)
    {
        $userID = auth()->user()->id;

        $penilaian = Penilaian::with('pilihanJawaban', 'alasan')->where('nomor', $no)
            ->first();

        $cekRiwayat = RiwayatPenilaian::where('penilaian_id', $penilaian->id)->where('users_id', $userID)->first();

        if ($cekRiwayat) {
            $jawabanSoal = $cekRiwayat->jawaban_soal;
            $jawabanAlasan = $cekRiwayat->jawaban_soal;
        } else {
            $jawabanSoal = '';
            $jawabanAlasan = '';
        }

        $data = [
            'penilaian' => $penilaian,
            'jawabanSoal' => $jawabanSoal,
            'jawabanAlasan' => $jawabanAlasan,
        ];

        return view('student.penilaian.index', $data);
    }

    public function store(Request $request, $id)
    {
        $lastNumber = Penilaian::orderBy('nomor', 'desc')->first();

        $userID = auth()->user()->id;

        // cek riwayat apakah sudah ada atau belum
        // jika sudah ada maka update
        // jika belum maka create
        $riwayat = RiwayatPenilaian::where('penilaian_id', $id)->where('users_id', $userID)->first();

        if ($riwayat) {
            RiwayatPenilaian::where('penilaian_id', $id)->where('users_id', $userID)->update([
                'jawaban_soal' => $request->jawaban,
                'jawaban_alasan' => $request->alasan,
            ]);
        } else {
            RiwayatPenilaian::create([
                'users_id' => $userID,
                'penilaian_id' => $id,
                'jawaban_soal' => $request->jawaban,
                'jawaban_alasan' => $request->alasan
            ]);
        }
        if ($lastNumber->nomor == $request->no) {
            echo "hore";
        } else {
            return to_route('student.penilaian', $request->no + 1)->with('success', 'Berhasil menjawab');
        }
    }
}
