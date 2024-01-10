<?php

namespace App\Http\Controllers;

use App\Models\ProfilPengembang;
use Illuminate\Http\Request;

class ProfilPengembangController extends Controller
{
    public function index()
    {
        $profil = ProfilPengembang::first();

        $data = [
            'active' => '',
            'profil' => $profil
        ];

        return view('profil-pengembang', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required',
            'body' => 'required'
        ], [
            'foto.required' => 'Foto harus diisi',
            'body.required' => 'Deskripsi harus diisi',
        ]);

        if ($request->id != 0) {
            $profil = ProfilPengembang::where('id', $request->id)->first();

            if ($request->file('foto')) {
                $file = $request->file('foto');
                $filename = date('His') . "." . $file->getClientOriginalExtension();
                $location = 'foto-pengembang/';
                $filepath = $location . $filename;
                $file->move($location, $filename);
                $foto = $filepath;

                if (file_exists(public_path($profil->foto)) && !is_dir($profil->foto)) {
                    unlink(public_path($profil->foto));
                }
            } else {
                $foto = $profil->foto;
            }

            ProfilPengembang::where('id', $request->id)->update([
                'foto' => $foto,
                'body' => $request->body
            ]);
        } else {
            if ($request->file('foto')) {
                $file = $request->file('foto');
                $filename = date('His') . "." . $file->getClientOriginalExtension();
                $location = 'foto-pengembang/';
                $filepath = $location . $filename;
                $file->move($location, $filename);
                $foto = $filepath;
            }

            ProfilPengembang::create([
                'foto' => $foto ?? '',
                'body' => $request->body
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil');
    }
}
