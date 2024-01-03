<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $user = new User();

        $countTeacher = $user->where('role', 'teacher')->count();
        $countStudent = $user->where('role', 'student')->count();

        $data = [
            'active' => 'dashboard',
            'countTeacher' => $countTeacher,
            'countStudent' => $countStudent
        ];

        return view('admin.dashboard.index', $data);
    }
}
