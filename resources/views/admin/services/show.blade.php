@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.service.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.service.fields.id') }}
                            </th>
                            <td>
                                {{ $service->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.service.fields.name') }}
                            </th>
                            <td>
                                {{ $service->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.service.fields.price') }}
                            </th>
                            <td>
                                {{ $service->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.service.fields.featured_image') }}
                            </th>
                            <td>
                                @if ($service->featured_image)
                                    <a href="{{ $service->featured_image['url'] }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $service->featured_image['thumbnail'] }}">
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.service.fields.duration') }}
                            </th>
                            <td>
                                {{ $service->duration }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
