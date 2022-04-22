<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Repositories\FileStorageRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
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
        $galleries = Gallery::select(['id', 'title', 'image', 'is_active'])->latest()->paginate(5);

        return view('backend.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGalleryRequest $request): RedirectResponse
    {
        $input = $request->validated();

        if ($request->file('image')) {
            $fileName = $this->fileStorageRepository->uploadTo($request, 'image', 'local', 'public/galleries');

            $input['image'] = $fileName;
        }

        Gallery::create($input);

        return redirect()->route('backend.galleries.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\View\View
     */
    public function edit(Gallery $gallery): View
    {
        return view('backend.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGalleryRequest  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery): RedirectResponse
    {
        $input = $request->validated();

        if ($request->file('image')) {
            $path = 'public/galleries/' . $gallery->image;

            $this->fileStorageRepository->remove($path);

            $fileName = $this->fileStorageRepository->uploadTo($request, 'image', 'local', 'public/galleries');

            $input['image'] = $fileName;
        }

        $gallery->update($input);

        return redirect()->route('backend.galleries.edit', $gallery->id)->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        $path = 'public/galleries/' . $gallery->image;

        $this->fileStorageRepository->remove($path);

        $gallery->delete();

        return redirect()->route('backend.galleries.index')->with('success', 'Data berhasil dihapus!');
    }
}
