<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumContent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function forum()
    {
        return $this->belongsToMany(Forum::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
