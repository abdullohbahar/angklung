<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function forumContent()
    {
        return $this->hasMany(ForumContent::class, 'forums_id', 'id');
    }
}
