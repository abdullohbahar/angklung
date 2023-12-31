<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataGuruController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')->orderBy('created_at', 'desc')->get();

        $data = [
            'active' => 'data-guru',
            'teachers' => $teachers
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

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6'
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = $request->username . '-' . date('His') . "." . $file->getClientOriginalExtension();
            $location = 'foto-guru/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $foto = $filepath;
        } else {
            $foto = './dashboard-assets/dummy-profile.jpg';
        }

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'role' => 'teacher',
            'foto' => $foto,
        ]);

        return to_route('admin.data.guru')->with('success', 'Berhasil Menambah Data Guru');
    }

    public function edit($id)
    {
        $teacher = User::findOrFail($id);

        $data = [
            'active' => 'data-guru',
            'teacher' => $teacher
        ];

        return view('admin.data-guru.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
        ]);

        $teacher = User::findOrFail($id);

        if ($teacher->username != $request->username) {
            $request->validate([
                'username' => 'unique:users,username',
            ]);
        }

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = $request->username . '-' . date('His') . "." . $file->getClientOriginalExtension();
            $location = 'foto-guru/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $foto = $filepath;

            if (file_exists(public_path($teacher->foto)) && !is_dir($teacher->foto)) {
                unlink(public_path($teacher->foto));
            }
        } else {
            $foto = $teacher->foto;
        }

        $data = [
            'username' => $request->username,
            'foto' => $foto,
            'fullname' => $request->fullname,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($data);

        return to_route('admin.data.guru')->with('success', 'Berhasil Mengubah Data Guru');
    }

    public function destroy(string $id)
    {
        try {
            $teacher = User::findOrFail($id); // Temukan guru yang akan dihapus

            // Hapus foto gambar jika ada
            if (file_exists(public_path($teacher->foto)) && !is_dir($teacher->foto)) {
                unlink(public_path($teacher->foto));
            }

            // Hapus guru dari tabel guru
            $teacher->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Data Guru',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Data Guru',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
