<?php

namespace App\Models;

use App\Http\Controllers\Guru\FileCapaianPembelajaranController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CapaianPembelajaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function files(): HasMany
    {
        return $this->hasMany(CapaianPembelajaranFile::class);
    }
}
