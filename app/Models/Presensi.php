<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function riwayatPresensi(): HasMany
    {
        return $this->hasMany(RiwayatPresensi::class);
    }
}
