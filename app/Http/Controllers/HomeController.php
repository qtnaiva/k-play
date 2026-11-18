<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Data\DummyData;

class HomeController extends Controller
{
    public function index()
    {
        $trending  = DummyData::trending();
        $news      = array_slice(DummyData::news(), 0, 3);
        $groups    = array_slice(DummyData::groups(), 0, 6);
        $posts     = array_slice(DummyData::posts(), 0, 3);
        $comebacks = DummyData::comebacks();

        return view('home', compact('trending', 'news', 'groups', 'posts', 'comebacks'));
    }
}