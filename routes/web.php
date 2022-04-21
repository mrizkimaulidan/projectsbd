<?php

use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\LogoutController;
use App\Http\Controllers\Backend\NewestCommentController;
use App\Http\Controllers\Backend\OldestCommentController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\ArticleController as FrontendArticleController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\GalleryController as FrontendGalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', LogoutController::class)->name('logout');


Route::name('backend.')->prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::resources([
        'sliders' => SliderController::class,
        'articles' => ArticleController::class,
        'galleries' => GalleryController::class,
        'users' => UserController::class
    ]);

    Route::name('comments.')->prefix('comments')->group(function () {
        Route::get('/newest-comments', [NewestCommentController::class, 'index'])->name('newest-comments.index');
        Route::get('/newest-comments/{comment}', [NewestCommentController::class, 'show'])->name('newest-comments.show');
        Route::post('/newest-comments/{comment}', [NewestCommentController::class, 'update'])->name('newest-comments.update');
        Route::delete('/newest-comments/{comment}', [NewestCommentController::class, 'destroy'])->name('newest-comments.destroy');

        Route::get('/oldest-comments', [OldestCommentController::class, 'index'])->name('oldest-comments.index');
        Route::get('/oldest-comments/{comment}', [OldestCommentController::class, 'show'])->name('oldest-comments.show');
        Route::post('/oldest-comments/{comment}', [OldestCommentController::class, 'update'])->name('oldest-comments.update');
        Route::delete('/oldest-comments/{comment}', [OldestCommentController::class, 'destroy'])->name('oldest-comments.destroy');
    });
});

Route::name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');

    Route::get('/articles', [FrontendArticleController::class, 'index'])->name('articles.index');
    Route::get('/article/{article:slug}', [FrontendArticleController::class, 'show'])->name('articles.show');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/galleries', [FrontendGalleryController::class, 'index'])->name('galleries.index');
});
