<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPeerAssesment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function belongsToPeerAssesment()
    {
        return $this->belongsTo(PeerAssesment::class, 'peer_assesment_id', 'id');
    }
}
