@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.id') }}
                            </th>
                            <td>
                                {{ $setting->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.title') }}
                            </th>
                            <td>
                                {{ $setting->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.mobile') }}
                            </th>
                            <td>
                                {{ $setting->mobile }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.email') }}
                            </th>
                            <td>
                                {{ $setting->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.address') }}
                            </th>
                            <td>
                                {{ $setting->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.instagram') }}
                            </th>
                            <td>
                                {{ $setting->instagram }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.tiktok') }}
                            </th>
                            <td>
                                {{ $setting->tiktok }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.facebook') }}
                            </th>
                            <td>
                                {{ $setting->facebook }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.twitter') }}
                            </th>
                            <td>
                                {{ $setting->twitter }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.youtube') }}
                            </th>
                            <td>
                                {{ $setting->youtube }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
