<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index()
    {
        $videos = Youtube::latest()->get();
        return view('backend.pages.youtube.index', compact('videos'));
    }

    public function create()
    {
        return view('backend.pages.youtube.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
        ]);

        Youtube::create($request->only('title', 'url', 'description'));

        return redirect()->route('youtube.index')->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit(Youtube $youtube)
    {
        return view('backend.pages.youtube.edit', compact('youtube'));
    }

    public function update(Request $request, Youtube $youtube)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
        ]);

        $youtube->update($request->only('title', 'url', 'description'));

        return redirect()->route('youtube.index')->with('success', 'Video berhasil diperbarui.');
    }

    public function destroy(Youtube $youtube)
    {
        $youtube->delete();

        return redirect()->route('youtube.index')->with('success', 'Video berhasil dihapus.');
    }
}
