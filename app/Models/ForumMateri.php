<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumMateri extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function forumContentMateri()
    {
        return $this->hasMany(ForumContentMateri::class, 'forum_materis_id', 'id');
    }
}
