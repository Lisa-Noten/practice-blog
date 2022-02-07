<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($filename)
    {
        $storagePath = storage_path('app/thumbnails' . $filename);
        return Image::make($storagePath)->response();
    }
}
