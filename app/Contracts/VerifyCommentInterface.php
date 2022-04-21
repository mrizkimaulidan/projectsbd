<?php

namespace App\Contracts;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

interface VerifyCommentInterface
{
    public function index(): View;
    public function show(Comment $comment): View;
    public function update(Comment $comment): RedirectResponse;
    public function destroy(Comment $comment): RedirectResponse;
}
