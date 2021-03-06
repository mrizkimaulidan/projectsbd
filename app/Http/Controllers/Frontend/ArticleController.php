<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $articles = Article::with(['user:id,name'])
            ->select(['user_id', 'title', 'slug', 'body', 'thumbnail', 'is_active', 'views', 'published_at'])->active()->latest();

        $articles = request()->has('search')
            ? $articles->search(request()->search)->paginate(9)
            : $articles->paginate(9);

        return view('frontend.articles.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article): View
    {
        $randomArticles = Article::select(['id', 'title', 'slug', 'body', 'thumbnail', 'is_active'])
            ->active()->inRandomOrder()->limit(3)->get();

        $article->increment('views', 1);

        return view('frontend.articles.show', compact('article', 'randomArticles'));
    }
}
