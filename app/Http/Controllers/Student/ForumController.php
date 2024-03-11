<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\ForumContent;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forum = ForumContent::with([
            'user'
        ])
            ->orderBy('created_at', 'desc')
            ->get();

        $userID = auth()->user()->id;

        $data = [
            'active' => 'forum',
            'forum' => $forum,
            'userID' => $userID
        ];

        return view('student.forum.detail', $data);
    }
}
