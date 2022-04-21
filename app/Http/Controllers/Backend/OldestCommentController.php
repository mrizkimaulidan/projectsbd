<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\VerifyCommentInterface;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OldestCommentController extends Controller implements VerifyCommentInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $oldestComments = Comment::select(['id', 'article_id', 'name', 'email', 'body', 'date', 'verified_by'])->where('is_verified', 1)->latest()->paginate(5);

        return view('backend.comments.oldest_comments.index', compact('oldestComments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\View\View
     */
    public function show(Comment $comment): View
    {
        return view('backend.comments.oldest_comments.show', compact('comment'));
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
            'is_verified' => 0,
            'verified_by' => null
        ]);

        return redirect()->route('backend.comments.oldest-comments.show', $comment)->with('success', 'Berhasil unverifikasi komentar!');
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

        return redirect()->route('backend.comments.oldest-comments.index')->with('success', 'Data berhasil dihapus!');
    }
}
