<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QuizSistemPendengaran as ModelsQuizSistemPendengaran;
use Illuminate\Http\Request;

class QuizSistemPendengaran extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $quiz = ModelsQuizSistemPendengaran::where('user_id', $userID)->first();

        if ($quiz) {
            return to_route('student.pilih.quiz')->with('warning', 'Anda Sudah Mengerjakan Quiz Sistem Pendengaran!');
        }

        return view('student.quiz-sistem-pendengaran.index');
    }

    public function store()
    {
        ModelsQuizSistemPendengaran::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('student.pilih.quiz')->with('notification', 'Selamat anda telah mengerjakan quiz Pendengaran !');
    }
}
