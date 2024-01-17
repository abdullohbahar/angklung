<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use App\Models\AktivitasBelajar;
use App\Models\Materi;
use Illuminate\Http\Request;

class AktivitasBelajarController extends Controller
{
    public function index()
    {
        $activities = AktivitasBelajar::orderBy('created_at', 'desc')->get();

        $data = [
            'activities' => $activities
        ];

        return view('student.main-menu.aktivitas-belajar', $data);
    }

    public function materi($title, $no)
    {
        $materi = AktivitasBelajar::with([
            'materi' => function ($query) use ($no) {
                $query->where('no', $no);
            }
        ])
            ->where('title', $title)
            ->first();

        dd($materi);
    }
}
