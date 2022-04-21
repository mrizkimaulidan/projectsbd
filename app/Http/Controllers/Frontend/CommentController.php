<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // TODO Validation
        $input = $request->all();
        $input['article_id'] = $request->articleId;

        $comment = Comment::create($input);

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => $comment

        ], Response::HTTP_CREATED);
    }
}
