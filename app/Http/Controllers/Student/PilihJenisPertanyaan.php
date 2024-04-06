<?php

namespace App\Http\Controllers\Student;

use App\Models\Timer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DoneAssesment;

class PilihJenisPertanyaan extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userID = auth()->user()->id;

        $timer = Timer::where('user_id', $userID)->first();

        if (!$timer) {
            Timer::create([
                'user_id' => $userID,
                'timer' => 3600
            ]);
        }

        $timer = Timer::where('user_id', $userID)->first();

        if ($timer->timer <= 0) {
            return to_route('main.menu')->with('warning', 'Anda telah kehabisan waktu untuk mengerjakan penilaian');
        }

        $done = DoneAssesment::where('user_id', $userID)->first();

        if ($done->is_done) {
            return to_route('main.menu')->with('warning', 'Anda telah mengerjakan penilaian');
        }

        return view('student.pilih-jenis-pertanyaan.index');
    }
}
