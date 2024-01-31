<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::orderBy('created_at', 'desc')->get();

        $data = [
            'forums' => $forums
        ];

        return view('student.forum.index', $data);
    }

    public function detail($id)
    {
        $forum = Forum::with([
            'forumContent.user' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }
        ])->findOrFail($id);

        if ($forum->status != 'open') {
            return redirect()->back()->with('warning', 'Forum Belum Dibuka');
        }

        $userID = auth()->user()->id;

        $data = [
            'active' => 'forum',
            'forum' => $forum,
            'userID' => $userID
        ];

        return view('student.forum.detail', $data);
    }
}
