<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kuesioner;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    public function index()
    {
        $kuesioners = Kuesioner::orderBy('created_at', 'asc')->get();

        $data = [
            'active' => 'kuesioner',
            'kuesioners' => $kuesioners,
        ];

        return view('guru.kuesioner.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'kuesioner',
        ];

        return view('guru.kuesioner.create', $data);
    }

    public function store(Request $request)
    {
        Kuesioner::create([
            'pernyataan' => $request->pernyataan
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan pernyataan');
    }

    public function edit($id)
    {
        $kuesioner = Kuesioner::findorfail($id);

        $data = [
            'active' => 'kuesioner',
            'kuesioner' => $kuesioner
        ];

        return view('guru.kuesioner.edit', $data);
    }

    public function update(Request $request, $id)
    {
        Kuesioner::where('id', $id)->update([
            'pernyataan' => $request->pernyataan
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah pernyataan');
    }

    public function destroy($id)
    {
        try {
            $materi = Kuesioner::findOrFail($id); // Temukan Capaian Pembelajaran yang akan dihapus

            // Hapus Capaian Pembelajaran dari tabel Capaian Pembelajaran
            $materi->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
