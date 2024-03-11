<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\EksperimenMateriGelombang;
use App\Models\ForumMateriGelombang;
use App\Models\JawabanEksplorasiMateriGelombang;
use App\Models\JawabanMateriGelombang;
use App\Models\QuizMateriGelombang;
use App\Models\RefleksiMateriGelombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MateriGelombangController extends Controller
{
    public function index()
    {
        return view('student.materi-gelombang.index');
    }

    public function orientasi()
    {
        $userID = auth()->user()->id;

        $jawaban1 = JawabanMateriGelombang::where('user_id', $userID)->where('nomor_soal', 1)->first()?->jawaban;

        $data = [
            'jawaban1' => $jawaban1 ?? '',
        ];

        return view('student.materi-gelombang.orientasi', $data);
    }

    public function storeOrientasi(Request $request)
    {
        JawabanMateriGelombang::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 1,
        ], [
            'jawaban' => $request->jawaban1,
        ]);

        return to_route('materi.gelombang.pernyataan1');
    }

    public function pernyataan1()
    {
        return view('student.materi-gelombang.pernyataan1');
    }

    public function storePernyataan1()
    {
        return to_route('materi.gelombang')->with('eksplorasi_notification', 'Untuk lebih memahami fenomena gelombang tersebut, Ayo lakukan eskplorasi !');
    }

    public function eksplorasi()
    {
        $userID = auth()->user()->id;

        $jawaban1 = JawabanEksplorasiMateriGelombang::where('user_id', $userID)->where('nomor_soal', 1)->first()?->jawaban ?? '';

        $data = [
            'jawaban1' => $jawaban1
        ];

        return view('student.materi-gelombang.eksplorasi', $data);
    }

    public function storeEksplorasi(Request $request)
    {
        JawabanEksplorasiMateriGelombang::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 1
        ], [
            'jawaban' => $request->jawaban1
        ]);

        return to_route('materi.gelombang.pernyataan2');
    }

    public function pernyataan2()
    {
        return view('student.materi-gelombang.pernyataan2');
    }

    public function storePernyataan2()
    {
        return to_route('materi.gelombang')->with('eksperimen_notification', 'Untuk lebih memahami konsep gelombang tali, Ayo lakukan eksperimen !');
    }

    public function eksperimen()
    {
        return view('student.materi-gelombang.eksperimen');
    }

    public function storeEksperimen()
    {
        EksperimenMateriGelombang::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('materi.gelombang')->with('notif', 'Selamat anda telah mengisi eksperimen !');
    }

    public function forum()
    {
        $forum = ForumMateriGelombang::all();
        $userID = auth()->user()->id;

        $data = [
            'forum' => $forum,
            'userID' => $userID
        ];

        return view('student.materi-gelombang.forum', $data);
    }

    public function storeForum(Request $request)
    {
        $userID = auth()->user()->id;

        ForumMateriGelombang::create([
            'user_id' => $userID,
            'body' => $request->body
        ]);

        return redirect()->back();
    }

    public function orientasi2()
    {
        $userID = auth()->user()->id;

        $jawaban2 = JawabanMateriGelombang::where('user_id', $userID)->where('nomor_soal', 2)->first()?->jawaban;
        $jawaban3 = JawabanMateriGelombang::where('user_id', $userID)->where('nomor_soal', 3)->first()?->jawaban;

        $data = [
            'jawaban2' => $jawaban2 ?? '',
            'jawaban3' => $jawaban3 ?? '',
        ];

        return view('student.materi-gelombang.orientasi2', $data);
    }

    public function storeOrientasi2(Request $request)
    {
        JawabanMateriGelombang::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 2,
        ], [
            'jawaban' => $request->jawaban2,
        ]);

        JawabanMateriGelombang::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 3,
        ], [
            'jawaban' => $request->jawaban3,
        ]);

        return to_route('materi.gelombang')->with('notification', 'Kalian hebat sudah menyelesaikan materi gelombang, sebelum lanjut isi refleksi dulu ya !');
    }

    public function refleksi()
    {
        return view('student.materi-gelombang.refleksi');
    }

    public function storeRefleksi(Request $request)
    {
        RefleksiMateriGelombang::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('aktivitas.belajar')->with('notification', 'Selamat anda telah mengisi refleksi Gelombang!');
    }

    public function quiz()
    {
        return view('student.materi-gelombang.quiz');
    }

    public function storeQuiz()
    {
        QuizMateriGelombang::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('main.menu')->with('notification', 'Selamat anda telah mengerjakan quiz !');
    }
}
