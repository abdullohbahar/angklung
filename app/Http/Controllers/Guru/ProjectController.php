<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::first();

        $data = [
            'active' => 'project',
            'project' => $project
        ];

        return view('guru.project.index', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ], [
            'body.required' => 'Isi harus diisi'
        ]);

        if (!$request->id) {
            Project::create([
                'body' => $request->body,
            ]);
        } else {
            Project::where('id', $request->id)->update([
                'body' => $request->body
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil Menyimpan');
    }
}
