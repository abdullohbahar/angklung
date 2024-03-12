<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Penilaian extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function pilihanJawaban(): HasOne
    {
        return $this->HasOne(PilihanJawaban::class);
    }

    public function alasan(): HasOne
    {
        return $this->HasOne(Alasan::class);
    }

    public function riwayatPenilaian()
    {
        return $this->hasOne(RiwayatPenilaian::class);
    }
}
