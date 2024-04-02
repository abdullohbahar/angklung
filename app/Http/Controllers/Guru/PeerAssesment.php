<?php

namespace App\Http\Controllers\Guru;

use App\Exports\PeerAssesmentExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PeerAssesment as ModelsPeerAssesment;

class PeerAssesment extends Controller
{
    public function index()
    {
        $kuesioners = ModelsPeerAssesment::orderBy('created_at', 'asc')->get();

        $data = [
            'active' => 'peer',
            'kuesioners' => $kuesioners,
        ];

        return view('guru.peer-assesment.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'peer',
        ];

        return view('guru.peer-assesment.create', $data);
    }

    public function store(Request $request)
    {
        ModelsPeerAssesment::create([
            'pernyataan' => $request->pernyataan
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan pernyataan');
    }

    public function edit($id)
    {
        $kuesioner = ModelsPeerAssesment::findorfail($id);

        $data = [
            'active' => 'peer',
            'kuesioner' => $kuesioner
        ];

        return view('guru.peer-assesment.edit', $data);
    }

    public function update(Request $request, $id)
    {
        ModelsPeerAssesment::where('id', $id)->update([
            'pernyataan' => $request->pernyataan
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah pernyataan');
    }

    public function destroy($id)
    {
        try {
            $materi = ModelsPeerAssesment::findOrFail($id); // Temukan Capaian Pembelajaran yang akan dihapus

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

    public function export()
    {
        return Excel::download(new PeerAssesmentExport, 'Peer Assesment.xlsx');
    }
}
