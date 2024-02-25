<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\JawabanPenilaianEssay;
use App\Models\PenilaianEssay;
use Illuminate\Http\Request;

class PenilianEssayController extends Controller
{
    public function index($no)
    {
        $userID = auth()->user()->id;

        $penilaian = PenilaianEssay::with('jawabanPenilaianEssay')->where('nomor_soal', $no)
            ->first();

        $cekRiwayat = JawabanPenilaianEssay::where('penilaian_essay_id', $penilaian->id)->where('user_id', $userID)->first();

        if ($cekRiwayat) {
            $jawabanSoal = $cekRiwayat->jawaban;
            $file = $cekRiwayat->file;
        } else {
            $jawabanSoal = '';
            $file = '';
        }

        $data = [
            'penilaian' => $penilaian,
            'jawabanSoal' => $jawabanSoal,
            'file' => $file,
        ];

        return view('student.penilaian-essay.index', $data);
    }

    public function store(Request $request, $id)
    {
        $userID = auth()->user()->id;

        // cek riwayat apakah sudah ada atau belum
        // jika sudah ada maka update
        // jika belum maka create
        $data = [
            'jawaban' => $request->jawaban,
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $location = 'file-essay/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $data['file'] = $filepath;
        }

        JawabanPenilaianEssay::updateorcreate([
            'user_id' => $userID,
            'penilaian_essay_id' => $id
        ], $data);

        $lastNumber = PenilaianEssay::count();

        if ($lastNumber == $request->no) {
            return to_route('student.penilaian.essay.selesai');
        } else {
            return to_route('student.penilaian.essay', $request->no + 1)->with('success', 'Berhasil menjawab');
        }
    }

    public function selesai()
    {
        return view('student.penilaian-essay.congratulation');
    }
}