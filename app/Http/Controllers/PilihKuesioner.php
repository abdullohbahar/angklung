<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PilihKuesioner extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('student.main-menu.pilih-kuesioner');
    }
}
