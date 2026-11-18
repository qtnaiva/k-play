<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Data\DummyData;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $posts = DummyData::posts();
        return view('community.index', compact('posts'));
    }

    public function show($id)
    {
        $posts = DummyData::posts();
        $post = collect($posts)->firstWhere('id', (int)$id);
        abort_unless($post, 404);
        $comments = DummyData::comments();
        return view('community.show', compact('post', 'comments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'isi'  => 'required|string|max:500',
            'grup' => 'nullable|string|max:100',
        ]);
        // TODO: nanti kirim ke GoogleSheetService
        return redirect()->route('community.index')->with('success', 'Postingan berhasil dibuat! 💜');
    }
}