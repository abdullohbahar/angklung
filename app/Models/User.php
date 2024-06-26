<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function forum()
    {
        return $this->hasMany(ForumContent::class);
    }

    public function hasManyJawabanSelfAssesment()
    {
        return $this->hasMany(JawabanKuesioner::class, 'user_id', 'id');
    }

    public function hasManyJawabanPeerAssesment()
    {
        return $this->hasMany(JawabanPeerAssesment::class, 'user_id', 'id');
    }
}
