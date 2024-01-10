<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Models\AktivitasBelajar;
use App\Http\Controllers\Controller;
use App\Models\Aktivitas;

class AktivitasController extends Controller
{
    public function index($idAktivitasBelajar)
    {
        $aktivitasBelajar = AktivitasBelajar::with('aktivitas')->findorfail($idAktivitasBelajar);

        $data = [
            'active' => 'aktivitas-belajar',
            'aktivitasBelajar' => $aktivitasBelajar
        ];

        return view('guru.aktivitas-belajar.aktivitas.index', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ], [
            'body.required' => 'Isi harus diisi'
        ]);

        if (!$request->id) {
            Aktivitas::create([
                'body' => $request->body,
                'aktivitas_belajar_id' => $request->idAktivitasBelajar
            ]);
        } else {
            Aktivitas::where('id', $request->id)->update([
                'body' => $request->body
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil Menyimpan');
    }
}
