<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Repositories\FileStorageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct(
        private FileStorageRepository $fileStorageRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $articles = Article::with(['user:id,name'])->select(['id', 'user_id', 'title', 'thumbnail', 'is_active'])->latest()->get();

        return view('backend.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('backend.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        if ($request->file('thumbnail')) {
            $fileName = $this->fileStorageRepository->handleFileUpload($request, 'thumbnail', 'local', 'public/articles');

            $validated['thumbnail'] = $fileName;
        }

        Article::create($validated);

        return redirect()->route('backend.articles.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article): View
    {
        return view('backend.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();

        if ($request->file('thumbnail')) {
            $path = 'public/articles/' . $article->thumbnail;

            $this->fileStorageRepository->removeFile($path);

            $fileName = $this->fileStorageRepository->handleFileUpload($request, 'thumbnail', 'local', 'public/articles');

            $validated['thumbnail'] = $fileName;
        }

        $article->update($validated);

        return redirect()->route('backend.articles.edit', $article->id)->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $path = 'public/sliders/' . $article->thumbnail;

        $this->fileStorageRepository->removeFile($path);

        $article->delete();

        return redirect()->route('backend.articles.index')->with('success', 'Data berhasil dihapus!');
    }
}
