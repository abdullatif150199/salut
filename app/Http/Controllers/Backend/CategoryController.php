<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.pages.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc'  => 'nullable|string',
        ]);

        Category::create([
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
            'desc'  => $request->desc,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('backend.pages.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc'  => 'nullable|string',
        ]);

        $category->update([
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
            'desc'  => $request->desc,
        ]);

        return redirect()->route('categories.index')->with('success', 'kategori Berhasil Diupdate');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori Berhasil Dihapus.');
    }
}
