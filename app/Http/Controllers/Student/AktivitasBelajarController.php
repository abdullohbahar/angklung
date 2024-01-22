<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use App\Models\AktivitasBelajar;
use App\Models\Materi;
use App\Models\RiwayatPengerjaanAktivitas;
use Illuminate\Http\Request;

class AktivitasBelajarController extends Controller
{
    public function index()
    {
        $activities = AktivitasBelajar::orderBy('created_at', 'desc')->get();

        $data = [
            'activities' => $activities
        ];

        return view('student.main-menu.aktivitas-belajar', $data);
    }

    public function cekCode(Request $request)
    {
        $aktivitasBelajar = AktivitasBelajar::where('title', $request->title)
            ->first();

        if ($request->code != $aktivitasBelajar->join_code) {
            return redirect()->back()->with('error', 'Kode Salah!');
        } else {
            return to_route('materi', [
                'title' => $request->title,
                'no' => $request->no
            ]);
        }
    }

    public function materi(Request $request, $title, $no)
    {

        $aktivitasBelajar = AktivitasBelajar::with([
            'materiHasOne' => function ($query) use ($no) {
                $query->where('no', $no);
            }
        ])
            ->where('title', $title)
            ->first();

        $data = [
            'aktivitasBelajar' => $aktivitasBelajar
        ];

        return view('student.materi.index', $data);
    }

    public function storeMateri(Request $request, $materiID, $no, $aktivitasBelajarID)
    {
        RiwayatPengerjaanAktivitas::create([
            'jawaban' => $request->jawaban,
            'materi_id' => $materiID,
            'users_id' => auth()->user()->id
        ]);

        $materi = Materi::with('aktivitasBelajar')->where('aktivitas_belajar_id', $aktivitasBelajarID)
            ->where('no', $no + 1)
            ->first();

        if ($materi) {
            return to_route('materi', [
                'title' => $materi->aktivitasBelajar->title,
                'no' => $no + 1
            ]);
        } else {
            echo "Hore";
        }
    }
}
