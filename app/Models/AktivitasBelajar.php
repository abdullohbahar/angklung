<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AktivitasBelajar extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function materi(): HasMany
    {
        return $this->hasMany(Materi::class);
    }

    public function aktivitas(): HasOne
    {
        return $this->hasOne(Aktivitas::class);
    }
}
