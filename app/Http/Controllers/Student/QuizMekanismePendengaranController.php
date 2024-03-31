<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QuizMekanismePendengaran;
use Illuminate\Http\Request;

class QuizMekanismePendengaranController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $quiz = QuizMekanismePendengaran::where('user_id', $userID)->first();

        if ($quiz) {
            return to_route('student.pilih.quiz')->with('warning', 'Anda Sudah Mengerjakan Quiz Mekanisme Pendengaran!');
        }

        return view('student.quiz-mekanisme-pendengaran.index');
    }

    public function store()
    {
        QuizMekanismePendengaran::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('student.pilih.quiz')->with('notification', 'Selamat anda telah mengerjakan quiz Mekanisme Pendengaran !');
    }
}
