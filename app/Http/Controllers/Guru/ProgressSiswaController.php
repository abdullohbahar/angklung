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

        $progressGetaran = $progress->progressGetaran($siswaID);
        $progressGelombang = $progress->progressGelombang($siswaID);
        $progressGelombangBunyi = $progress->progressGelombangBunyi($siswaID);

        $data = [
            'presensis' => $presensis,
            'progressGetaran' => $progressGetaran,
            'progressGelombang' => $progressGelombang,
            'progressGelombangBunyi' => $progressGelombangBunyi,
            'active' => 'data-siswa'
        ];

        return view('guru.progress-siswa.index', $data);
    }
}
