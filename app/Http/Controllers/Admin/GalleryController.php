<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Admin\StoreGalleryRequest;
use App\Http\Requests\Admin\UpdateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GalleryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleries = Gallery::with(['media'])->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        abort_if(Gate::denies('gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleries.create');
    }

    public function store(StoreGalleryRequest $request)
    {
        $gallery = Gallery::create($request->all());

        if ($request->input('featured_image', false)) {
            $gallery->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $gallery->id]);
        }

        return redirect()->route('admin.galleries.index');
    }

    public function edit(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $gallery->update($request->all());

        if ($request->input('featured_image', false)) {
            if (! $gallery->featured_image || $request->input('featured_image') !== $gallery->featured_image->file_name) {
                if ($gallery->featured_image) {
                    $gallery->featured_image->delete();
                }
                $gallery->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($gallery->featured_image) {
            $gallery->featured_image->delete();
        }

        return redirect()->route('admin.galleries.index');
    }

    public function show(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleries.show', compact('gallery'));
    }

    public function destroy(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gallery->delete();

        return back();
    }
}
