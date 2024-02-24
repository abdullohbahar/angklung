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
            $jawabanAlasan = $cekRiwayat->jawaban_alasan;
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
        $userID = auth()->user()->id;

        // perhitungan penilaian
        // mengambil kunci jawaban dan kunci alasan
        $penilaian = Penilaian::where('nomor', $request->no)->first();

        // jawaban
        $jawaban = $request->jawaban;
        $alasan = $request->alasan;

        // kunci
        $kunciJawaban = $penilaian->kunci_jawaban;
        $kunciAlasan = $penilaian->kunci_alasan;

        if ($jawaban == $kunciJawaban && $alasan == $kunciAlasan) {
            $score = 4;
        } else if ($jawaban == $kunciJawaban && $alasan != $kunciAlasan) {
            $score = 3;
        } else if ($jawaban != $kunciJawaban && $alasan == $kunciAlasan) {
            $score = 2;
        } else if ($jawaban != $kunciJawaban && $alasan != $kunciAlasan) {
            $score = 1;
        }

        // cek riwayat apakah sudah ada atau belum
        // jika sudah ada maka update
        // jika belum maka create
        $riwayat = RiwayatPenilaian::where('penilaian_id', $id)->where('users_id', $userID)->first();

        if ($riwayat) {
            RiwayatPenilaian::where('penilaian_id', $id)->where('users_id', $userID)->update([
                'jawaban_soal' => $request->jawaban,
                'jawaban_alasan' => $request->alasan,
                'score' => $score
            ]);
        } else {
            RiwayatPenilaian::create([
                'users_id' => $userID,
                'penilaian_id' => $id,
                'jawaban_soal' => $request->jawaban,
                'jawaban_alasan' => $request->alasan,
                'score' => $score
            ]);
        }

        $lastNumber = Penilaian::orderBy('nomor', 'desc')->first();

        if ($lastNumber->nomor == $request->no) {
            // dd("x");
            return to_route('student.penilaian.selesai');
        } else {
            return to_route('student.penilaian', $request->no + 1)->with('success', 'Berhasil menjawab');
        }
    }

    public function selesai()
    {
        return view('student.penilaian.congratulation');
    }
}
