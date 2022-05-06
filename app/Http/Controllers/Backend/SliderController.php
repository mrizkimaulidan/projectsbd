<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use App\Repositories\FileStorageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SliderController extends Controller
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
        $sliders = Slider::select(['id', 'title', 'image', 'is_active'])->orderBy('title')->latest()->paginate(5);

        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSliderRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $fileName = $this->fileStorageRepository->handleFileUpload($request, 'image', 'local', 'public/sliders');

            $validated['image'] = $fileName;
        }

        Slider::create($validated);

        return redirect()->route('backend.sliders.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\View\View
     */
    public function edit(Slider $slider): View
    {
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSliderRequest $request, Slider $slider): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            $path = 'public/sliders/' . $slider->image;

            // remove the old file
            $this->fileStorageRepository->removeFile($path);

            // upload the new file.
            $fileName = $fileName = $this->fileStorageRepository->handleFileUpload($request, 'image', 'local', 'public/sliders');

            $validated['image'] = $fileName;
        }

        $slider->update($validated);

        return redirect()->route('backend.sliders.edit', $slider->id)->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Slider $slider): RedirectResponse
    {
        $path = 'public/sliders/' . $slider->image;

        $this->fileStorageRepository->removeFile($path);

        $slider->delete();

        return redirect()->route('backend.sliders.index')->with('success', 'Data berhasil dihapus!');
    }
}
