<?php

namespace App\Http\Controllers\Guru;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DataSiswaController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->orderBy('created_at', 'desc')->get();

        $data = [
            'active' => 'data-siswa',
            'students' => $students
        ];

        return view('guru.data-siswa.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'data-siswa'
        ];

        return view('guru.data-siswa.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'jenis_kelamin' => 'required'
        ], [
            'fullname.required' => 'Nama Lengkap Harus Diisi',
            'username.required' => 'NIS Harus Diisi',
            'username.unique' => 'NIS Sudah Dipakai',
            'password.required' => 'Password Harus Diiisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diiisi',
            'password.min' => 'Password Minimal 6 Karakter'
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = $request->username . '-' . date('His') . "." . $file->getClientOriginalExtension();
            $location = 'foto-guru/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $foto = $filepath;
        } else {
            if ($request->jenis_kelamin == 'Laki-Laki') {
                $foto = './foto-profil/angklung-man.png';
            } else if ($request->jenis_kelamin == 'Perempuan') {
                $foto = './foto-profil/angklung-girl.png';
            }
        }

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'foto' => $foto,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        return to_route('guru.data.siswa')->with('success', 'Berhasil Menambah Data Siswa');
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);

        $data = [
            'active' => 'data-siswa',
            'student' => $student
        ];

        return view('guru.data-siswa.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required'
        ], [
            'fullname.required' => 'Nama Lengkap Harus Diisi',
            'username.required' => 'NIS Harus Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diiisi',
        ]);

        $student = User::findOrFail($id);

        if ($student->username != $request->username) {
            $request->validate([
                'username' => 'unique:users,username',
            ], [
                'username.unique' => 'NIS Sudah Dipakai',
            ]);
        }

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = $request->username . '-' . date('His') . "." . $file->getClientOriginalExtension();
            $location = 'foto-guru/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $foto = $filepath;

            if (file_exists(public_path($student->foto)) && !is_dir($student->foto)) {
                unlink(public_path($student->foto));
            }
        } else {
            $foto = $student->foto;
        }

        $data = [
            'username' => $request->username,
            'foto' => $foto,
            'fullname' => $request->fullname,
            'jenis_kelamin' => $request->jenis_kelamin
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($data);

        return to_route('guru.data.siswa')->with('success', 'Berhasil Mengubah Data Siswa');
    }

    public function destroy(string $id)
    {
        try {
            $student = User::findOrFail($id); // Temukan siswa yang akan dihapus

            // Hapus foto gambar jika ada
            if (file_exists(public_path($student->foto)) && !is_dir($student->foto)) {
                unlink(public_path($student->foto));
            }

            // Hapus Siswa dari tabel Siswa
            $student->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Data Siswa',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Data Siswa',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
