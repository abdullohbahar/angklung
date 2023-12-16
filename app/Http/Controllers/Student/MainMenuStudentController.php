<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainMenuStudentController extends Controller
{
    public function index()
    {
        return view('student.main-menu.index');
    }
}
