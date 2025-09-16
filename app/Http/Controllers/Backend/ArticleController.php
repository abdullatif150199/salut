<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
     public function index()
    {
        // confirmDelete("Delete Item", "Yakin ingin menghapus item ini?");
        $articles = Article::with('category')->latest()->get();
        return view('backend.pages.article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|unique:articles,title',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required',
            // 'pinned' => 'boolean',
            // 'published_at' => 'required|date',
        ]);


        $data['slug'] = Str::slug($request->title);
        // $data['excerpt'] = Str::words(strip_tags($data['body']), 20); // ambil 20 kata dari body tanpa tag HTML
        // $data['user_id'] = Auth::id();
        // $data['view_count'] = 0;
        // $data['pinned'] = $request->boolean('pinned');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('backend.pages.article.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
           'title' => 'required|string|max:255|unique:articles,title,' . $article->id,
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required',
            'pinned' => 'boolean',
            // 'published_at' => 'required|date',
        ]);

        $data['slug'] = Str::slug($request->title);
        // $data['excerpt'] = Str::words(strip_tags($data['body']), 20); // auto buat excerpt
        // $data['pinned'] = $request->boolean('pinned');

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
