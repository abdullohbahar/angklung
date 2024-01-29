<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\RiwayatPresensi;
use Illuminate\Http\Request;

class MainMenuStudentController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;
        $dateNow = date('Y-m-d');
        $riwayatPresensi = RiwayatPresensi::where('users_id', $userID)->where('tanggal', $dateNow)->first();
        $presensi = Presensi::where('tanggal', $dateNow)->first();

        if ($riwayatPresensi) {
            $button = 'btnExist';
        } else {
            $button = 'btnNotExist';
        }

        if ($presensi) {
            $presensi = $presensi;
        } else {
            $button = 'btnNotReady';
            $presensi = NULL;
        }

        $data = [
            'button' => $button,
            'userID' => $userID,
            'presensi' => $presensi
        ];

        return view('student.main-menu.index', $data);
    }

    public function storePresensi(Request $request)
    {
        $userID = auth()->user()->id;
        $dateNow = date('Y-m-d');

        RiwayatPresensi::create([
            'presensi_id' => $request->presensi_id,
            'users_id' => $userID,
            'status' => 'masuk',
            'tanggal' => $dateNow
        ]);

        return redirect()->back()->with('success', 'Berhasil melakukan presensi');
    }
}
