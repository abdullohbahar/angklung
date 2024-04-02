<?php

namespace App\Exports;

use App\Models\JawabanKuesioner;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class SelfAssesmentExport implements FromView, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $selfAssesment = User::with('hasManyJawabanSelfAssesment.belongsToKuesioner')->where('role', 'student')->get();

        // dd($selfAssesment);

        $data = [
            'selfAssesments' => $selfAssesment
        ];

        return view('export.self-assesment', $data);
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
