<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Data\DummyData;

class ProfileController extends Controller
{
    public function index()
    {
        $user     = DummyData::userProfile();
        $activity = DummyData::userActivity();
        return view('profile.index', compact('user', 'activity'));
    }

    public function bias()
    {
        $user  = DummyData::userProfile();
        $idols = DummyData::idols();
        $bias  = collect($idols)->firstWhere('nama', $user['bias']);
        return view('profile.bias', compact('user', 'bias', 'idols'));
    }

    public function groups()
    {
        $user   = DummyData::userProfile();
        $groups = DummyData::groups();
        return view('profile.groups', compact('user', 'groups'));
    }

    public function playlist()
    {
        $playlist = DummyData::playlist();
        return view('profile.playlist', compact('playlist'));
    }

    public function notifications()
    {
        $notifs = DummyData::notifications();
        return view('profile.notifications', compact('notifs'));
    }
}