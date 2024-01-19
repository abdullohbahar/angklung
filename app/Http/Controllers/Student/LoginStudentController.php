<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginStudentController extends Controller
{
    public function index()
    {
        return view('student.login.index');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'NIS harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $auth = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($auth)) {
            $request->session()->regenerate();

            switch (Auth::user()->role) {
                case 'student':
                    return redirect()->route('main.menu');
                    break;
                default:
                    return redirect()->route('login')->with('error', 'NIS atau password salah');
            }
        }

        return redirect()->route('guru.login')->with([
            'error' => 'username atau password salah',
            'email' => $request->email
        ]);
    }
}
