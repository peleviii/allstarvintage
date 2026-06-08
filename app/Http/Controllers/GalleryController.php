<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $folders = Storage::disk('s3')->directories();
        sort($folders);
        return view('gallery.index', compact('folders'));
    }

    public function show($folder)
    {
        $folder = urldecode($folder);
        $files = Storage::disk('s3')->files($folder);
        $images = array_filter($files, fn($f) => preg_match('/\.(jpg|jpeg|png|webp|mp4|mov|avi)$/i', $f));
        $images = array_values($images);

        $baseUrl = 'https://allstarvintage-media.fra1.cdn.digitaloceanspaces.com/';

        return view('gallery.show', compact('folder', 'images', 'baseUrl'));
    }
}
