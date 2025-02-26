@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{ trans('cruds.setting.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}">
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="mobile">{{ trans('cruds.setting.fields.mobile') }}</label>
                    <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text"
                        name="mobile" id="mobile" value="{{ old('mobile', '') }}" required>
                    @if ($errors->has('mobile'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mobile') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.mobile_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" id="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.setting.fields.address') }}</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                        name="address" id="address" value="{{ old('address', '') }}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                    <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text"
                        name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                    @if ($errors->has('instagram'))
                        <div class="invalid-feedback">
                            {{ $errors->first('instagram') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="tiktok">{{ trans('cruds.setting.fields.tiktok') }}</label>
                    <input class="form-control {{ $errors->has('tiktok') ? 'is-invalid' : '' }}" type="text"
                        name="tiktok" id="tiktok" value="{{ old('tiktok', '') }}">
                    @if ($errors->has('tiktok'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tiktok') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.tiktok_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                    <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text"
                        name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                    @if ($errors->has('facebook'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                    <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text"
                        name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                    @if ($errors->has('twitter'))
                        <div class="invalid-feedback">
                            {{ $errors->first('twitter') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="youtube">{{ trans('cruds.setting.fields.youtube') }}</label>
                    <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text"
                        name="youtube" id="youtube" value="{{ old('youtube', '') }}">
                    @if ($errors->has('youtube'))
                        <div class="invalid-feedback">
                            {{ $errors->first('youtube') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.youtube_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
