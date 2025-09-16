<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Youtube;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {


        return view('backend.pages.dashboard.index', [
            'articlesCount'     => Article::count(),
            'galleriesCount'    => Gallery::count(),
            'videosCount'    => Youtube::count(),
            // 'testimoniesCount'  => Testimonial::count(),
            // 'faqsCount'         => Faq::count(),

            // Data terbaru
            'recentArticles'    => Article::latest()->take(10)->get(),
            'visitors' => Applicant::latest()->get(),

        ]);
    }
}
