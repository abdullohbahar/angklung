<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UbahBahasa extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($bahasa)
    {
        session()->put('bahasa', $bahasa);

        return redirect()->back();
    }
}
