<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPenilaianEssay extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasOneSoal()
    {
        return $this->hasOne(PenilaianEssay::class, 'id', 'penilaian_essay_id');
    }
}
