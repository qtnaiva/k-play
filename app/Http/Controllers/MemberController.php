<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected array $dummy = [
        ['id' => 1, 'nama' => 'Rina',   'bias' => 'BTS',       'role' => 'Fanartist',    'bio' => 'Suka gambar Jungkook 💜'],
        ['id' => 2, 'nama' => 'Dimas',  'bias' => 'BLACKPINK','role' => 'Cover Dancer', 'bio' => 'Dancer sejak 2020'],
        ['id' => 3, 'nama' => 'Sari',   'bias' => 'SEVENTEEN','role' => 'Video Editor', 'bio' => 'Edit video cinematic'],
    ];

    public function index()
    {
        $members = $this->dummy;
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'bias' => 'required|string|max:100',
            'role' => 'required|string|max:100',
            'bio'  => 'nullable|string|max:300',
        ]);

        // TODO: nanti diganti $gs->insert('members', $validated);
        // Untuk sekarang: langsung redirect dengan pesan sukses

        return redirect()->route('members.index')
            ->with('success', 'Selamat bergabung di K-PLAY, ' . $validated['nama'] . '! 💜');
    }
}