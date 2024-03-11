<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EksplorasiMateriGelombangBunyi;
use App\Models\JawabanMateriGelombang;
use App\Models\JawabanMateriGelombangBunyi;

class MateriGelombangBunyiController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $jawaban1 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 1)->first()?->jawaban;
        $jawaban2 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 2)->first()?->jawaban;
        $jawaban3 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 3)->first()?->jawaban;
        $jawaban4 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 4)->first()?->jawaban;
        $jawaban5 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 5)->first()?->jawaban;
        $eksplorasi = EksplorasiMateriGelombangBunyi::where('user_id', $userID)->first()?->is_answered ?? null;

        $validate = [
            'jawaban1' => $jawaban1 ?? null,
            'jawaban2' => $jawaban2 ?? null,
            'jawaban3' => $jawaban3 ?? null,
            'jawaban4' => $jawaban4 ?? null,
            'jawaban5' => $jawaban5 ?? null,
            'eksplorasi' => $eksplorasi
        ];

        // Check if all values are not null
        if (empty(array_filter($validate, 'is_null'))) {
            // All values are not null, redirect back
            return redirect()->back()->with('warning', 'Anda telah mengerjakan materi gelombang bunyi');
        }

        return view('student.materi-gelombang-bunyi.index');
    }

    public function orientasi()
    {
        $userID = auth()->user()->id;

        $jawaban1 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 1)->first()?->jawaban;
        $jawaban2 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 2)->first()?->jawaban;
        $jawaban3 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 3)->first()?->jawaban;
        $jawaban4 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 4)->first()?->jawaban;
        $jawaban5 = JawabanMateriGelombangBunyi::where('user_id', $userID)->where('nomor_soal', 5)->first()?->jawaban;

        $data = [
            'jawaban1' => $jawaban1 ?? '',
            'jawaban2' => $jawaban2 ?? '',
            'jawaban3' => $jawaban3 ?? '',
            'jawaban4' => $jawaban4 ?? '',
            'jawaban5' => $jawaban5 ?? '',
        ];

        return view('student.materi-gelombang-bunyi.orientasi', $data);
    }

    public function storeOrientasi(Request $request)
    {
        JawabanMateriGelombangBunyi::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 1,
        ], [
            'jawaban' => $request->jawaban1,
        ]);

        JawabanMateriGelombangBunyi::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 2,
        ], [
            'jawaban' => $request->jawaban2,
        ]);

        JawabanMateriGelombangBunyi::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 3,
        ], [
            'jawaban' => $request->jawaban3,
        ]);

        JawabanMateriGelombangBunyi::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 4,
        ], [
            'jawaban' => $request->jawaban4,
        ]);

        JawabanMateriGelombangBunyi::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 5,
        ], [
            'jawaban' => $request->jawaban5,
        ]);

        return to_route('materi.gelombang.bunyi.pernyataan1');
    }

    public function pernyataan1()
    {
        return view('student.materi-gelombang-bunyi.pernyataan1');
    }

    public function redirectPernyataan1()
    {
        return to_route('materi.gelombang.bunyi')->with('eksplorasi_notification', 'Untuk mengenal Angklung lebih jauh, Mari lakukan eksplorasi di Saung Angklung Udjo !');
    }

    public function eksplorasi()
    {
        return view('student.materi-gelombang-bunyi.eksplorasi');
    }

    public function storeEksplorasi()
    {
        EksplorasiMateriGelombangBunyi::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('materi.gelombang.bunyi')->with('notif', 'Selamat anda telah mengisi eksplorasi !');
    }
}
