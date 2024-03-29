<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\JawabanPeerAssesment;
use App\Models\PeerAssesment;
use Illuminate\Http\Request;

class PeerAssesmentController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $jawaban = JawabanPeerAssesment::where('user_id', $userID)->first();

        $kuesioners = PeerAssesment::orderBy('created_at', 'asc')->get();

        $data = [
            'kuesioners' => $kuesioners
        ];

        return view('student.main-menu.peer-assesment.index', $data);
    }

    public function store(Request $request)
    {
        $userID = auth()->user()->id;

        foreach ($request->jawaban as $kuesioner_id => $jawaban) {
            JawabanPeerAssesment::create([
                'user_id' => $userID,
                'peer_assesment_id' => $kuesioner_id,
                'jawaban' => $jawaban,
                'friend_name' => $request->friend_name
            ]);
        }

        return to_route('main.menu')->with('success', 'Berhasil mengisi');
    }
}
