<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Models\RiwayatPresensi;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Student\ProgressController;

class ProgressSiswaController extends Controller
{
    public function index($siswaID)
    {
        $presensis = RiwayatPresensi::orderBy('tanggal', 'desc')->where('users_id', $siswaID)->get();

        $progress = new ProgressController();

        $summary = $progress->progressAktivitasBelajar($siswaID);

        $data = [
            'presensis' => $presensis,
            'summary' => $summary,
            'active' => 'data-siswa'
        ];

        return view('guru.progress-siswa.index', $data);
    }
}
