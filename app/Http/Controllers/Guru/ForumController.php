<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\ForumContent;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::orderBy('created_at', 'desc')->get();

        $data = [
            'active' => 'forum',
            'forums' => $forums
        ];

        return view('guru.forum.index', $data);
    }

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

        return view('guru.forum.detail', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'forum',
        ];

        return view('guru.forum.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:forums,judul',
            'status' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi',
            'judul.unique' => 'Judul sudah dipakai',
            'status.required' => 'Status harus diisi',
        ]);

        Forum::create([
            'judul' => $request->judul,
            'status' => $request->status
        ]);

        return to_route('guru.forum')->with('success', 'Berhasil membuat forum');
    }

    public function edit($id)
    {
        $forum = Forum::findorfail($id);

        $data = [
            'active' => 'forum',
            'forum' => $forum
        ];

        return view('guru.forum.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'status' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi',
            'status.required' => 'Status harus diisi',
        ]);

        $forum = Forum::findorfail($id);

        if ($request->judul != $forum->judul) {
            $request->validate([
                'judul' => 'unique:forums,judul',
            ], [
                'judul.unique' => 'Judul sudah dipakai',
            ]);
        }

        $forum->judul = $request->judul;
        $forum->status = $request->status;
        $forum->save();

        return to_route('guru.forum')->with('success', 'Berhasil mengubah forum');
    }

    public function destroy($id)
    {
        try {
            $materi = Forum::findOrFail($id); // Temukan Capaian Pembelajaran yang akan dihapus

            // Hapus Capaian Pembelajaran dari tabel Capaian Pembelajaran
            $materi->delete();

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Forum',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Forum',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function clear($id)
    {
        try {
            $forumContent = ForumContent::where('forums_id', $id)->delete(); // Temukan forum content yang akan dihapus

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
