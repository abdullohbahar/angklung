<?php

namespace App\Http\Controllers;

use App\Models\Timer;
use Illuminate\Http\Request;

class TimerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userID = auth()->user()->id;

        // Ambil timer dari database
        $timer = Timer::where('user_id', $userID)->first();
        // Kurangi nilai timer
        $timer->timer--;
        // Simpan perubahan
        $timer->save();

        return response()->json(['status' => 'success']);
    }
}
