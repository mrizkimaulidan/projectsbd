<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Slider;
use Illuminate\View\View;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $sliders = Slider::select(['title', 'description', 'image', 'is_active'])->active()->get();
        $articleLimit2 = Article::select(['title', 'slug', 'body', 'thumbnail', 'is_active'])->latest()->limit(2)->get();
        $articles = Article::with(['user:id,name'])->select(['user_id', 'title', 'slug', 'body', 'thumbnail', 'is_active', 'views', 'published_at'])
            ->active()->latest()->limit(6)->get();
        $galleries = Gallery::select(['title', 'description', 'is_active', 'image'])->active()->oldest()->limit(12)->get();

        return view('frontend.index', compact('sliders', 'articleLimit2', 'articles', 'galleries'));
    }
}
