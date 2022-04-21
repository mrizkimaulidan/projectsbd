<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('users:id,name')
            ->select(['user_id', 'title', 'slug', 'body', 'thumbnail', 'is_active', 'views', 'published_at'])
            ->where('is_active', 1)
            ->latest()
            ->paginate(9);

        return view('frontend.articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        $randomArticles = Article::select(['id', 'title', 'slug', 'body', 'thumbnail', 'is_active'])->where('is_active', 1)->inRandomOrder(3)->get();

        $article->increment('views', 1);

        return view('frontend.articles.show', compact('article', 'randomArticles'));
    }
}
