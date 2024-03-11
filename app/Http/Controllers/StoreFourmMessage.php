<?php

namespace App\Http\Controllers;

use App\Models\ForumContent;
use Illuminate\Http\Request;

class StoreFourmMessage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userID = auth()->user()->id;

        ForumContent::create([
            'users_id' => $userID,
            'body' => $request->body
        ]);

        return redirect()->back()->with('success', 'Berhasil');
    }
}
