<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianEssay extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jawabanPenilaianEssay()
    {
        return $this->hasOne(JawabanPenilaianEssay::class);
    }
}
