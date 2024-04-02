<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanKuesioner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function belongsToUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function belongsToKuesioner()
    {
        return $this->belongsTo(Kuesioner::class, 'kuesioner_id', 'id');
    }
}
