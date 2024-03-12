<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\RiwayatPenilaian;
use App\Http\Controllers\Controller;

class CekSkorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $userID = auth()->user()->id;

        $pilgans = RiwayatPenilaian::where('users_id', $userID)->orderBy('created_at', 'asc')->get();

        $data = [
            'pilgans' => $pilgans,
        ];

        return view('student.penilaian-essay.cek-skor', $data);
    }
}
