<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthGuruController extends Controller
{
    public function index()
    {
        return view('guru.login.index');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => ':attribute harus diisi',
            'password.required' => ':attribute harus diisi',
        ]);

        $auth = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($auth)) {
            $request->session()->regenerate();

            switch (Auth::user()->role) {
                case 'teacher':
                    return redirect()->route('guru.dashboard');
                    break;
                default:
                    return redirect()->route('login')->with('error', 'Username atau password salah');
            }
        }

        return redirect()->route('guru.login')->with([
            'error' => 'username atau password salah',
            'email' => $request->email
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('guru.login')->with('success', 'Logout Successfully');
    }
}
