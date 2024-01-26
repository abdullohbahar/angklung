<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaveImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $request->validate([
        //     'upload' => 'required|image|mimes:jpeg,png,jpg',
        // ]);

        // if ($request->hasFile('upload')) {
        //     $file = $request->file('upload');
        //     $filename = $file->getClientOriginalName();
        //     $path = $file->storeAs('upload', $filename, 'local');

        //     $data = [
        //         'file' => $filename,
        //         'url' => Storage::disk('local')->url($path),
        //         'uploaded' => 1,
        //     ];

        //     return response()->json($data);
        // } else {
        //     $data = [
        //         'uploaded' => 0,
        //         'error' => [
        //             'message' => 'Error! file not uploaded',
        //         ],
        //     ];

        //     return response()->json($data, 500);
        // }

        $data = array();
        if (isset($_FILES['upload']['name'])) {
            $filename = $_FILES['upload']['name'];
            $filepath = 'upload/' . $filename;
            $fileextension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

            if ($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png') {
                if (move_uploaded_file($_FILES['upload']['tmp_name'], $filepath)) {
                    $data['file'] = $filename;
                    $data['url'] = asset($filepath);
                    $data['uploaded'] = 1;
                } else {
                    $data['uploaded'] = 0;
                    $data['error']['message'] = 'Error! file not uploaded';
                }
            } else {
                $data['uploaded'] = 0;
                $data['error']['message'] = 'invalid extension';
            }
        }
        echo json_encode($data);
    }
}
