<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $file = $request->file('image');

        $image = Image::create([
            'filename' => $file->getClientOriginalName(),
            'mime' => $file->getMimeType(),
            'data' => base64_encode(file_get_contents($file->getRealPath())),
        ]);

        $url = route('image.show', $image->slug);

        return back()->with('success', 'Imagen subida correctamente')->with('url', $url);
    }

    public function show($slug)
    {
        $image = Image::where('slug', $slug)->firstOrFail();

        return response(base64_decode($image->data))
            ->header('Content-Type', $image->mime)
            ->header('Cache-Control', 'public, max-age=31536000');
    }

    public function gallery()
    {
        $images = Image::latest()->get();
        return view('gallery', compact('images'));
    }

    public function destroy($slug)
    {
        $image = Image::where('slug', $slug)->firstOrFail();
        $image->delete();

        return redirect()->route('gallery')->with('success', 'Imagen eliminada correctamente');
    }
}
