<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ExplorasiStudentController extends Controller
{
    public function index()
    {
        $eksplorasi = Project::firstorfail();

        $data = [
            'eksplorasi' => $eksplorasi
        ];

        return view('student.eksplorasi.index', $data);
    }
}
