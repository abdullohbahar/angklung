<?php

namespace App\Http\Controllers\Student;

use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\PenilaianEssay;
use App\Models\RiwayatPresensi;
use App\Models\AktivitasBelajar;
use App\Models\RiwayatPenilaian;
use App\Models\ForumMateriGetaran;
use App\Models\QuizMateriGelombang;
use App\Http\Controllers\Controller;
use App\Models\ForumMateriGelombang;
use App\Models\JawabanMateriGetaran;
use App\Models\JawabanPenilaianEssay;
use App\Models\RefleksiMateriGetaran;
use App\Models\JawabanMateriGelombang;
use App\Models\EksperimenMateriGetaran;
use App\Models\RefleksiMateriGelombang;
use App\Models\EksperimenMateriGelombang;
use App\Models\JawabanMateriGelombangBunyi;
use App\Models\EksplorasiMateriGelombangBunyi;
use App\Models\JawabanEksplorasiMateriGelombang;

class ProgressController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $presensis = RiwayatPresensi::orderBy('tanggal', 'desc')->where('users_id', $userID)->get();

        $progressGetaran = $this->progressGetaran($userID);
        $progressGelombang = $this->progressGelombang($userID);
        $progressGelombangBunyi = $this->progressGelombangBunyi($userID);
        $pilgans = RiwayatPenilaian::where('users_id', $userID)->orderBy('created_at', 'asc')->get();
        $essays = JawabanPenilaianEssay::with('hasOneSoal')->where('user_id', $userID)->orderBy('created_at', 'asc')->get();

        $data = [
            'presensis' => $presensis,
            'progressGetaran' => $progressGetaran,
            'progressGelombang' => $progressGelombang,
            'progressGelombangBunyi' => $progressGelombangBunyi,
            'pilgans' => $pilgans,
            'essays' => $essays,

        ];
        return view('student.progres.index', $data);
    }

    public function progressGetaran($userID)
    {
        $orientasi = JawabanMateriGetaran::where('user_id', $userID)->count();

        if ($orientasi == 0) {
            $percentOrientasi = 0;
        } else if ($orientasi == 1) {
            $percentOrientasi = 6.25;
        } else if ($orientasi == 2) {
            $percentOrientasi = 12.5;
        } else if ($orientasi == 3) {
            $percentOrientasi = 18.75;
        } else if ($orientasi == 4) {
            $percentOrientasi = 25;
        }

        $eksperimen = EksperimenMateriGetaran::where('user_id', $userID)->count();

        if ($eksperimen != 0) {
            $percentEksperimen = 25;
        } else if ($eksperimen == 0) {
            $percentEksperimen = 0;
        }

        $forum = ForumMateriGetaran::where('user_id', $userID)->count();

        if ($forum == 0) {
            $percentForum = 0;
        } else {
            $percentForum = 25;
        }

        $refleksi = RefleksiMateriGetaran::where('user_id', $userID)->count();

        if ($refleksi != 0) {
            $percentRefleksi = 25;
        } else if ($refleksi == 0) {
            $percentRefleksi = 0;
        }

        $total = $percentOrientasi + $percentEksperimen + $percentForum + $percentRefleksi;

        return $total;
    }

    public function progressGelombang($userID)
    {
        $orientasi = JawabanMateriGelombang::where('user_id', $userID)->count();

        if ($orientasi == 0) {
            $percentOrientasi = 0;
        } else if ($orientasi == 1) {
            $percentOrientasi = 5.5;
        } else if ($orientasi == 2) {
            $percentOrientasi = 11;
        } else if ($orientasi == 3) {
            $percentOrientasi = 16.7;
        }

        $eksplorasi = JawabanEksplorasiMateriGelombang::where('user_id', $userID)->count();

        if ($eksplorasi == 0) {
            $percentEksplorasi = 0;
        } else {
            $percentEksplorasi = 16.7;
        }

        $eksperimen = EksperimenMateriGelombang::where('user_id', $userID)->count();

        if ($eksperimen == 0) {
            $percentEksperimen = 0;
        } else {
            $percentEksperimen = 16.7;
        }

        $forum = ForumMateriGelombang::where('user_id', $userID)->count();

        if ($forum == 0) {
            $percentForum = 0;
        } else {
            $percentForum = 16.7;
        }

        $refleksi = RefleksiMateriGelombang::where('user_id', $userID)->count();

        if ($refleksi == 0) {
            $percentRefleksi = 0;
        } else {
            $percentRefleksi = 16.7;
        }

        $quiz = QuizMateriGelombang::where('user_id', $userID)->count();

        if ($quiz == 0) {
            $percentQuiz = 0;
        } else {
            $percentQuiz = 16.7;
        }

        $total = $percentOrientasi + $percentEksplorasi + $percentEksperimen + $percentForum + $percentRefleksi + $percentQuiz;

        if ($total > 100) {
            $total = 100;
        }

        return $total;
    }

    public function progressGelombangBunyi($userID)
    {
        $orientasi = JawabanMateriGelombangBunyi::where('user_id', $userID)->count();

        if ($orientasi == 0) {
            $percentOrientasi = 0;
        } else if ($orientasi == 1) {
            $percentOrientasi = 10;
        } else if ($orientasi == 2) {
            $percentOrientasi = 20;
        } else if ($orientasi == 3) {
            $percentOrientasi = 30;
        } else if ($orientasi == 4) {
            $percentOrientasi = 40;
        } else if ($orientasi == 5) {
            $percentOrientasi = 50;
        }

        $eksplorasi = EksplorasiMateriGelombangBunyi::where('user_id', $userID)->count();

        if ($eksplorasi == 0) {
            $percentEksplorasi = 0;
        } else {
            $percentEksplorasi = 50;
        }

        $total = $percentEksplorasi + $percentOrientasi;

        return $total;
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
