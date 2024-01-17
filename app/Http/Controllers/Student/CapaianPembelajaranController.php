<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\CapaianPembelajaran;
use App\Http\Controllers\Controller;

class CapaianPembelajaranController extends Controller
{
    public function index()
    {
        $capaians = CapaianPembelajaran::all();

        $data = [
            'capaians' => $capaians
        ];

        return view('student.main-menu.capaian-pembelajaran', $data);
    }
}
