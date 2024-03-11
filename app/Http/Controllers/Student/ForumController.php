<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function detail($id)
    {
        $forum = Forum::with([
            'forumContent.user' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }
        ])->findOrFail($id);

        $userID = auth()->user()->id;

        $data = [
            'active' => 'forum',
            'forum' => $forum,
            'userID' => $userID
        ];

        return view('student.forum.detail', $data);
    }
}
