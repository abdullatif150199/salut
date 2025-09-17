<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
     public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.pages.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backend.pages.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|string|max:255',
            'img' => 'nullable|image',
            'content' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $imageName = $request->file('img') ? $request->file('img')->store('testimonials', 'public') : null;

        Testimonial::create([
            'user' => $request->user,
            'img' => $imageName,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('backend.pages.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'user' => 'required|string|max:255',
            'img' => 'nullable|image',
            'content' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        if ($request->hasFile('img')) {
            // Hapus gambar lama
            if ($testimonial->img && Storage::disk('public')->exists($testimonial->img)) {
                Storage::disk('public')->delete($testimonial->img);
            }

            $imageName = $request->file('img')->store('testimonials', 'public');
            $testimonial->img = $imageName;
        }

        $testimonial->user = $request->user;
        $testimonial->rating = $request->rating;
        $testimonial->content = $request->content;
        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->img && Storage::disk('public')->exists($testimonial->img)) {
            Storage::disk('public')->delete($testimonial->img);
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
