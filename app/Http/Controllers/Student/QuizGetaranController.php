<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QuizGetaran;
use Illuminate\Http\Request;

class QuizGetaranController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $quiz = QuizGetaran::where('user_id', $userID)->first();

        if ($quiz) {
            return to_route('student.pilih.quiz')->with('warning', 'Anda Sudah Mengerjakan Quiz Getaran!');
        }

        return view('student.quiz-getaran.index');
    }

    public function store()
    {
        QuizGetaran::updateorcreate([
            'user_id' => auth()->user()->id,
        ], [
            'is_answered' => true
        ]);

        return to_route('student.pilih.quiz')->with('notification', 'Selamat anda telah mengerjakan quiz getaran !');
    }
}
