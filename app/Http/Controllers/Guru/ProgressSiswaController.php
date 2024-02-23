<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Models\RiwayatPresensi;
use App\Http\Controllers\Controller;
use App\Models\JawabanMateriGetaran;
use App\Models\JawabanMateriGelombang;
use App\Models\EksperimenMateriGelombang;
use App\Models\JawabanMateriGelombangBunyi;
use App\Models\JawabanEksplorasiMateriGelombang;
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

        // jawaban materi getaran

        $jawabanGetaran1 = JawabanMateriGetaran::where('user_id', $siswaID)->where('nomor_soal', 1)->first()?->jawaban;
        $jawabanGetaran2 = JawabanMateriGetaran::where('user_id', $siswaID)->where('nomor_soal', 2)->first()?->jawaban;
        $jawabanGetaran3 = JawabanMateriGetaran::where('user_id', $siswaID)->where('nomor_soal', 3)->first()?->jawaban;
        $jawabanGetaran4 = JawabanMateriGetaran::where('user_id', $siswaID)->where('nomor_soal', 4)->first()?->jawaban;

        $jawabanGelombang1 = JawabanMateriGelombang::where('user_id', $siswaID)->where('nomor_soal', 1)->first()?->jawaban;
        $jawabanEksplorasiGelombang = JawabanEksplorasiMateriGelombang::where('user_id', $siswaID)->where('nomor_soal', 1)->first()?->jawaban;
        $jawabanGelombang2 = JawabanMateriGelombang::where('user_id', $siswaID)->where('nomor_soal', 2)->first()?->jawaban;
        $jawabanGelombang3 = JawabanMateriGelombang::where('user_id', $siswaID)->where('nomor_soal', 3)->first()?->jawaban;

        $jawabanGelombangBunyi1 = JawabanMateriGelombangBunyi::where('user_id', $siswaID)->where('nomor_soal', 1)->first()?->jawaban;
        $jawabanGelombangBunyi2 = JawabanMateriGelombangBunyi::where('user_id', $siswaID)->where('nomor_soal', 2)->first()?->jawaban;
        $jawabanGelombangBunyi3 = JawabanMateriGelombangBunyi::where('user_id', $siswaID)->where('nomor_soal', 3)->first()?->jawaban;
        $jawabanGelombangBunyi4 = JawabanMateriGelombangBunyi::where('user_id', $siswaID)->where('nomor_soal', 4)->first()?->jawaban;
        $jawabanGelombangBunyi5 = JawabanMateriGelombangBunyi::where('user_id', $siswaID)->where('nomor_soal', 5)->first()?->jawaban;

        $data = [
            'presensis' => $presensis,
            'progressGetaran' => $progressGetaran,
            'progressGelombang' => $progressGelombang,
            'progressGelombangBunyi' => $progressGelombangBunyi,
            'jawabanGetaran1' => $jawabanGetaran1,
            'jawabanGetaran2' => $jawabanGetaran2,
            'jawabanGetaran3' => $jawabanGetaran3,
            'jawabanGetaran4' => $jawabanGetaran4,
            'jawabanGelombang1' => $jawabanGelombang1,
            'jawabanGelombang2' => $jawabanGelombang2,
            'jawabanGelombang3' => $jawabanGelombang3,
            'jawabanEksplorasiGelombang' => $jawabanEksplorasiGelombang,
            'jawabanGelombangBunyi1' => $jawabanGelombangBunyi1,
            'jawabanGelombangBunyi2' => $jawabanGelombangBunyi2,
            'jawabanGelombangBunyi3' => $jawabanGelombangBunyi3,
            'jawabanGelombangBunyi4' => $jawabanGelombangBunyi4,
            'jawabanGelombangBunyi5' => $jawabanGelombangBunyi5,
            'active' => 'data-siswa'
        ];

        return view('guru.progress-siswa.index', $data);
    }
}
