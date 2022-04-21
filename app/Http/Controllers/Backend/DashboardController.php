<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request): View
    {
        $countArticle = Article::count();
        $countUser = User::count();

        $newestComments = Comment::with(['article:id,title'])->select(['id', 'article_id', 'name', 'email', 'body', 'date', 'is_verified'])
            ->where('is_verified', 0)
            ->latest()
            ->limit(5)
            ->get();

        $verifiedComments = Comment::where('is_verified', 1)->count();
        $unverifiedComments = Comment::where('is_verified', 0)->count();

        $popularArticles = Article::select(['title', 'views'])->orderBy('views', 'DESC')->limit(5)->get();

        return view('backend.dashboard', compact('countArticle', 'countUser', 'newestComments', 'verifiedComments', 'unverifiedComments', 'popularArticles'));
    }
}
