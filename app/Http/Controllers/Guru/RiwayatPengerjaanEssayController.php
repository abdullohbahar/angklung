<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JawabanPenilaianEssay;
use App\Models\RiwayatPenilaian;
use App\Models\User;
use Illuminate\Http\Request;

class RiwayatPengerjaanEssayController extends Controller
{
    public function index($siswaID)
    {
        $user = User::findorfail($siswaID);
        $pilgans = RiwayatPenilaian::where('users_id', $siswaID)->orderBy('created_at', 'asc')->get();
        $essays = JawabanPenilaianEssay::with('hasOneSoal')->where('user_id', $siswaID)->orderBy('created_at', 'asc')->get();

        $data = [
            'active' => 'data-siswa',
            'user' => $user,
            'pilgans' => $pilgans,
            'essays' => $essays
        ];

        return view('guru.riwayat-penilaian-essay.index', $data);
    }

    public function addScore(Request $request)
    {
        JawabanPenilaianEssay::where('id', $request->essay_id)->update([
            'score' => $request->score
        ]);

        return redirect()->back()->with('success', 'Berhasil');
    }
}
