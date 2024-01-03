<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\CapaianPembelajaran;
use Illuminate\Http\Request;

class CapaianPembelajaranController extends Controller
{
    public function index()
    {
        $capaianPembelajaran = CapaianPembelajaran::orderBy('created_at', 'desc')->get();

        $data = [
            'active' => 'capaian-pembelajaran',
            'capaianPembelajaran' => $capaianPembelajaran
        ];

        return view('guru.capaian-pembelajaran.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'capaian-pembelajaran'
        ];

        return view('guru.capaian-pembelajaran.create', $data);
    }
}
