<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::select(['title', 'description', 'image', 'is_active'])->where('is_active', 1)->get();
        $articleLimit2 = Article::select(['title', 'slug', 'body', 'thumbnail', 'is_active'])->latest()->limit(2)->get();
        $articles = Article::with(['users:id,name'])->select(['user_id', 'title', 'slug', 'body', 'thumbnail', 'is_active', 'views', 'published_at'])
            ->where('is_active', 1)->latest()->limit(6)->get();
        $galleries = Gallery::select(['title', 'description', 'is_active', 'image'])->where('is_active', 1)->oldest()->limit(12)->get();

        return view('frontend.index', compact('sliders', 'articleLimit2', 'articles', 'galleries'));
    }
}
