<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $galleries = Gallery::select(['title', 'description', 'image', 'is_active'])->where('is_active', 1)->paginate(12);

        return view('frontend.galleries.index', compact('galleries'));
    }
}
