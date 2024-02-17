<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanMateri extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function jawaban()
    {
        return $this->hasOne(JawabanPertanyaanMateri::class);
    }
}
