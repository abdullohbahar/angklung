<?php

namespace App\Exports;

use App\Models\JawabanKuesioner;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PeerAssesmentExport implements FromView, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $peerAssesment = User::with('hasManyJawabanPeerAssesment.belongsToPeerAssesment')->where('role', 'student')->get();

        // dd($peerAssesment);

        $data = [
            'peerAssesments' => $peerAssesment
        ];

        return view('export.peer-assesment', $data);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 12,
            'B' => 100,
            'C' => 8,
        ];
    }
}
