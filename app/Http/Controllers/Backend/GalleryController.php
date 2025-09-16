<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('images')->latest()->paginate(10);
        return view('backend.pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.pages.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // 'subtitle' => 'nullable|string',
            'img_thumb' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gallery = Gallery::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            // 'subtitle' => $request->subtitle,
            'img_thumb' => $request->file('img_thumb')?->store('thumbnails', 'public'),
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $gallery->images()->create([
                    'path' => $img->store('galleries', 'public'),
                ]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Galeri Berhasil Ditambahkan');
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // 'subtitle' => 'nullable|string',
            'img_thumb' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        if ($request->hasFile('img_thumb')) {
            Storage::disk('public')->delete($gallery->img_thumb);
            $thumbPath = $request->file('img_thumb')->store('thumbnails', 'public');
        } else {
            $thumbPath = $gallery->img_thumb;
        }


        $gallery->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            // 'subtitle' => $request->subtitle,
            'img_thumb' => $thumbPath,
            'description' => $request->description,
        ]);


        if ($request->hasFile('images')) {
            foreach ($gallery->images as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }

            foreach ($request->file('images') as $img) {
                $gallery->images()->create([
                    'path' => $img->store('galleries', 'public'),
                ]);
            }
        }

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil diperbarui');
    }


    public function show(Gallery $gallery)
    {
        $gallery->load('images');
        return view('backend.pages.gallery.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        $gallery->load('images');
        return view('backend.pages.gallery.edit', compact('gallery'));
    }


    public function destroy(Gallery $gallery)
    {
        if ($gallery->img_thumb && Storage::disk('public')->exists($gallery->img_thumb)) {
            Storage::disk('public')->delete($gallery->img_thumb);
        }

        foreach ($gallery->images as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Galeri Berhasil Dihapus');
    }
}
