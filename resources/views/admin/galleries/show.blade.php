@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.gallery.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.galleries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.id') }}
                            </th>
                            <td>
                                {{ $gallery->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.title') }}
                            </th>
                            <td>
                                {{ $gallery->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.location') }}
                            </th>
                            <td>
                                {{ $gallery->location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.featured_image') }}
                            </th>
                            <td>
                                @if ($gallery->featured_image)
                                    <a href="{{ $gallery->featured_image->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $gallery->featured_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gallery.fields.status') }}
                            </th>
                            <td>
                                {{ App\Models\Gallery::STATUS_SELECT[$gallery->status] ?? '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.galleries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
