<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = \App\Models\Gallery::latest()->take(10)->get();
        $articles = \App\Models\Article::latest()->take(10)->get();
        $videos = \App\Models\Youtube::latest()->take(10)->get();
        $settings = \App\Models\Setting::first();
        $testimonials = \App\Models\Testimonial::latest()->take(10)->get();
        $faqs = \App\Models\Faq::all();
        return view('frontend.pages.home.index', compact('galleries', 'articles', 'videos', 'settings', 'testimonials', 'faqs'));
    }

    public function detailArticle($slug)
    {
        $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
        $articles = \App\Models\Article::where('id', '!=', $article->id)->latest()->get();
        // dd($articles);
        // $settings = \App\Models\Setting::first();
        return view('frontend.pages.article.detail', compact('article', 'articles'));
    }
}
