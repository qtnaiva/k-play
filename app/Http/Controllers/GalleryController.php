<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Data\DummyData;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = DummyData::gallery();
        return view('gallery.index', compact('gallery'));
    }
}