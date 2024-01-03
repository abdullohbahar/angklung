<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->orderBy('created_at', 'desc')->get();

        $data = [
            'active' => 'data-siswa',
            'students' => $students
        ];

        return view('admin.data-siswa.index', $data);
    }
}
