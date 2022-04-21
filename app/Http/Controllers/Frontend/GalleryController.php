<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::select(['title', 'description', 'image', 'is_active'])->where('is_active', 1)->paginate(12);

        return view('frontend.galleries.index', compact('galleries'));
    }
}
