<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function aktivitasBelajar(): HasOne
    {
        return $this->hasOne(AktivitasBelajar::class, 'id', 'aktivitas_belajar_id');
    }

    public function riwayatPengerjaanAktivitas(): HasOne
    {
        return $this->hasOne(RiwayatPengerjaanAktivitas::class);
    }
}
