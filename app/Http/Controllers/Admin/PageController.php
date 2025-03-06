<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::with(['media'])->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        abort_if(Gate::denies('page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.create');
    }

    public function store(StorePageRequest $request)
    {
        $page = Page::create($request->all());

        if ($request->input('about_us_image', false)) {
            $page->addMedia(storage_path('tmp/uploads/'.basename($request->input('about_us_image'))))
                ->withManipulations([
                    '*' => function ($image) {
                        $image->fit(Fit::Contain, 200, 200);
                    }
                ])
                ->toMediaCollection('about_us_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $page->id]);
        }

        return redirect()->route('admin.pages.index');
    }

    public function edit(Page $page)
    {
        abort_if(Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->all());

        if ($request->input('about_us_image', false)) {
            if (! $page->about_us_image || $request->input('about_us_image') !== $page->about_us_image->file_name) {
                if ($page->about_us_image) {
                    $page->about_us_image->delete();
                }
                $page->addMedia(storage_path('tmp/uploads/'.basename($request->input('about_us_image'))))
                    ->withManipulations([
                        '*' => function ($image) {
                            $image->fit(Fit::Contain, 200, 200);
                        }
                    ])

                    ->toMediaCollection('about_us_image');
            }
        } elseif ($page->about_us_image) {
            $page->about_us_image->delete();
        }

        return redirect()->route('admin.pages.index');
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('page_create') && Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Page;
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
