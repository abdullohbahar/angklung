<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'data-guru'
        ];

        return view('admin.data-guru.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'data-guru'
        ];

        return view('admin.data-guru.create', $data);
    }
}
