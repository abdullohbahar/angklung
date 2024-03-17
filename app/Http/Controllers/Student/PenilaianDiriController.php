<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\JawabanKuesioner;
use App\Models\Kuesioner;
use Illuminate\Http\Request;

class PenilaianDiriController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $jawaban = JawabanKuesioner::where('user_id', $userID)->first();

        if ($jawaban) {
            return redirect()->back()->with('warning', 'Anda sudah mengisi penilaian diri');
        }

        $kuesioners = Kuesioner::orderBy('created_at', 'asc')->get();

        $data = [
            'kuesioners' => $kuesioners
        ];

        return view('student.main-menu.penilaian-diri.index', $data);
    }

    public function store(Request $request)
    {
        $userID = auth()->user()->id;

        foreach ($request->jawaban as $kuesioner_id => $jawaban) {
            JawabanKuesioner::create([
                'user_id' => $userID,
                'kuesioner_id' => $kuesioner_id,
                'jawaban' => $jawaban
            ]);
        }

        return to_route('main.menu')->with('success', 'Berhasil mengisi penilaian diri');
    }
}
