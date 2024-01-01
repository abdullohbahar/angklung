<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'profile'
        ];

        return view('profile.index', $data);
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
            $location = 'foto/';
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

        return redirect()->back()->with('success', 'Berhasil Mengubah Profile');
    }
}
