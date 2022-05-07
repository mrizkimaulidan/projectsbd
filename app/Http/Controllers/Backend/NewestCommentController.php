<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\VerifyCommentInterface;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewestCommentController extends Controller implements VerifyCommentInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $newestComments = Comment::with('article:id,title')->select(['id', 'article_id', 'name', 'email', 'body', 'date'])
            ->isVerified(false)->latest()->get();

        return view('backend.comments.newest_comments.index', compact('newestComments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\View\View
     */
    public function show(Comment $comment): View
    {
        return view('backend.comments.newest_comments.show', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Comment $comment): RedirectResponse
    {
        $comment->update([
            'is_verified' => 1,
            'verified_by' => auth()->id()
        ]);

        return redirect()->route('backend.comments.newest-comments.show', $comment)->with('success', 'Berhasil verifikasi komentar!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('backend.comments.newest-comments.index')->with('success', 'Data berhasil dihapus!');
    }
}
