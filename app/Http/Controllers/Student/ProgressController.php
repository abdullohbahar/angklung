<?php

namespace App\Http\Controllers\Student;

use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AktivitasBelajar;
use App\Models\RiwayatPresensi;

class ProgressController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $presensis = RiwayatPresensi::orderBy('tanggal', 'desc')->where('users_id', $userID)->get();

        $summary = $this->progressAktivitasBelajar($userID);

        $data = [
            'presensis' => $presensis,
            'summary' => $summary
        ];
        return view('student.progres.index', $data);
    }

    public function progressAktivitasBelajar($userID)
    {
        $aktivitasBelajar = AktivitasBelajar::with('materi.riwayatPengerjaanAktivitas')->withCount('materi')->get();

        $data = [];
        $totalRiwayat = 0;

        foreach ($aktivitasBelajar as $key => $aktivitas) {

            $data['summary'][$key] = [
                'title' => $aktivitas->title,
                'total_materi' => $aktivitas->materi_count,
            ];

            // Mengambil total materi pada setiap aktivitas belajar

            // Jika ingin mengakses total riwayat pengerjaan aktivitas dari semua materi pada setiap aktivitas belajar
            foreach ($aktivitas->materi as $materi) {
                $riwayatPengerjaan = $materi->riwayatPengerjaanAktivitas()->where('users_id', $userID)->first();

                if ($riwayatPengerjaan) {
                    $totalRiwayat += 1;
                }
            }

            $data['summary'][$key]['total_riwayat'] = $totalRiwayat;
            $data['summary'][$key]['presentase'] = ($totalRiwayat / $aktivitas->materi_count) * 100;

            $totalRiwayat = 0;
        }

        return $data;
    }
}
