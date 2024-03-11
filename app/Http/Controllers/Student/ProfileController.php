<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\RiwayatPresensi;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;
        $dateNow = date('Y-m-d');

        $user = User::findorfail($userID);

        $presensi = Presensi::where('tanggal', $dateNow)->first();
        $riwayatPresensi = RiwayatPresensi::where('users_id', $userID)->where('tanggal', $dateNow)->first();

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
            'user' => $user,
            'presensi' => $presensi,
            'button' => $button,
            'userID' => $userID
        ];

        return view('student.main-menu.profile.index', $data);
    }
}
