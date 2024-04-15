<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\EksperimenMateriGetaran;
use App\Models\ForumMateriGetaran;
use App\Models\JawabanMateriGetaran;
use App\Models\RefleksiMateriGetaran;
use App\Models\ResumeDiskusiMateriGerakan;
use Illuminate\Http\Request;

class MateriGetaranStudentController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $jawaban1 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 1)->first()?->jawaban ?? null;
        $jawaban2 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 2)->first()?->jawaban ?? null;
        $jawaban3 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 3)->first()?->jawaban ?? null;
        $jawaban4 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 4)->first()?->jawaban ?? null;
        $eksperimen = EksperimenMateriGetaran::where('user_id', $userID)->first()?->is_answered ?? null;

        $validate = [
            'jawaban1' => $jawaban1,
            'jawaban2' => $jawaban2,
            'jawaban3' => $jawaban3,
            'jawaban4' => $jawaban4,
            'eksperimen' => $eksperimen,
        ];

        // Check if all values are not null
        if (empty(array_filter($validate, 'is_null'))) {
            // All values are not null, redirect back
            return redirect()->back()->with('warning', 'Anda telah mengerjakan materi getaran');
        }

        return view('student.materi-getaran.index');
    }

    public function orientasi()
    {
        $userID = auth()->user()->id;

        $jawaban1 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 1)->first()?->jawaban;
        $jawaban2 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 2)->first()?->jawaban;

        $data = [
            'jawaban1' => $jawaban1 ?? '',
            'jawaban2' => $jawaban2 ?? ''
        ];

        return view('student.materi-getaran.orientasi', $data);
    }

    public function storeOrientasi(Request $request)
    {
        JawabanMateriGetaran::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 1,
        ], [
            'jawaban' => $request->jawaban1,
        ]);

        JawabanMateriGetaran::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 2,
        ], [
            'jawaban' => $request->jawaban2,
        ]);

        return to_route('materi.getaran.pernyataan1');
    }

    public function pernyataan1()
    {
        $userID = auth()->user()->id;

        $jawaban3 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 3)->first()?->jawaban;
        $jawaban4 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 4)->first()?->jawaban;

        $data = [
            'jawaban3' => $jawaban3 ?? '',
            'jawaban4' => $jawaban4 ?? ''
        ];

        return view('student.materi-getaran.pernyataan1', $data);
    }

    public function orientasi2()
    {
        $userID = auth()->user()->id;

        $jawaban3 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 3)->first()?->jawaban;
        $jawaban4 = JawabanMateriGetaran::where('user_id', $userID)->where('nomor_soal', 4)->first()?->jawaban;

        $data = [
            'jawaban3' => $jawaban3 ?? '',
            'jawaban4' => $jawaban4 ?? ''
        ];

        return view('student.materi-getaran.orientasi2', $data);
    }

    public function storeOrientasi2(Request $request)
    {
        JawabanMateriGetaran::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 3,
        ], [
            'jawaban' => $request->jawaban3,
        ]);

        JawabanMateriGetaran::updateorcreate([
            'user_id' => auth()->user()->id,
            'nomor_soal' => 4,
        ], [
            'jawaban' => $request->jawaban4,
        ]);

        return to_route('materi.getaran')->with('experiment_notification', 'Untuk lebih memahami konsep getaran, Ayo lakukan eksplorasi !');
    }

    public function eksperimen()
    {
        return view('student.materi-getaran.eksperimen');
    }

    public function storeEksperimen(Request $request)
    {
        EksperimenMateriGetaran::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('materi.getaran')->with('notif', 'Anda telah menyelesaikan eksperimen !');
    }

    public function forum()
    {
        $forum = ForumMateriGetaran::all();
        $userID = auth()->user()->id;

        $data = [
            'forum' => $forum,
            'userID' => $userID
        ];

        return view('student.materi-getaran.forum', $data);
    }

    public function storeForum(Request $request)
    {
        $userID = auth()->user()->id;

        ForumMateriGetaran::create([
            'user_id' => $userID,
            'body' => $request->body
        ]);

        return redirect()->back();
    }

    public function resume()
    {
        $userID = auth()->user()->id;

        $resume = ResumeDiskusiMateriGerakan::where('user_id', $userID)->first()?->resume ?? '';

        $data = [
            'resume' => $resume
        ];

        return view('student.materi-getaran.resume', $data);
    }

    public function storeResume(Request $request)
    {
        $userID = auth()->user()->id;

        ResumeDiskusiMateriGerakan::updateorcreate([
            'user_id' => $userID,
        ], [
            'resume' => $request->resume
        ]);

        return to_route('materi.getaran')->with('notification', 'Kalian hebat sudah menyelesaikan materi getaran, sebelum lanjut isi refleksi dulu ya !');
    }

    public function refleksi()
    {
        $userID = auth()->user()->id;

        $refleksiMateriGetaran = RefleksiMateriGetaran::where('user_id', $userID)->first();

        if ($refleksiMateriGetaran) {
            return redirect()->back()->with('warning', 'Anda Telah Mengerjakan Refleksi Getaran');
        }

        return view('student.materi-getaran.refleksi');
    }

    public function storeRefleksi(Request $request)
    {
        RefleksiMateriGetaran::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('aktivitas.belajar')->with('notification', 'Selamat anda telah mengisi refleksi Getaran!');
    }
}
