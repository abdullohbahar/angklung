<?php

namespace App\Http\Controllers\Guru;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardGuruController extends Controller
{
    public function index()
    {
        $user = new User();

        $countStudent = $user->where('role', 'student')->count();

        $data = [
            'active' => 'dashboard',
            'countStudent' => $countStudent
        ];

        return view('guru.dashboard.index', $data);
    }
}
