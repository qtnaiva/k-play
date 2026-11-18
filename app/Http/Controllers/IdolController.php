<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Data\DummyData;

class IdolController extends Controller
{
    public function index()
    {
        $idols = DummyData::idols();
        return view('idols.index', compact('idols'));
    }

    public function show($id)
    {
        $idols = DummyData::idols();
        $idol = collect($idols)->firstWhere('id', (int)$id);
        abort_unless($idol, 404);
        return view('idols.show', compact('idol'));
    }

    public function groups()
    {
        $groups = DummyData::groups();
        return view('idols.groups', compact('groups'));
    }
}