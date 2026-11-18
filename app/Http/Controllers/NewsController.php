<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Data\DummyData;

class NewsController extends Controller
{
    public function index()
    {
        $news = DummyData::news();
        return view('news.index', compact('news'));
    }

    public function calendar()
    {
        $comebacks = DummyData::comebacks();
        return view('news.calendar', compact('comebacks'));
    }
}