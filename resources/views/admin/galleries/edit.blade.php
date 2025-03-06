@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.gallery.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.galleries.update", [$gallery->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.gallery.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="location">{{ trans('cruds.gallery.fields.location') }}</label>
                    <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $gallery->location) }}">
                    @if($errors->has('location'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.location_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="featured_image">{{ trans('cruds.gallery.fields.featured_image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                    </div>
                    @if($errors->has('featured_image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('featured_image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.featured_image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.gallery.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Gallery::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('status', $gallery->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.gallery.fields.positioning') }}</label>
                    <select class="form-control {{ $errors->has('positioning') ? 'is-invalid' : '' }}" name="positioning" id="positioning">
                        <option value disabled {{ old('positioning', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Gallery::POSITIONING_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('positioning', $gallery->positioning) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('positioning'))
                        <div class="invalid-feedback">
                            {{ $errors->first('positioning') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.gallery.fields.positioning_helper') }}</span>
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

@section('scripts')
    <script>
        Dropzone.options.featuredImageDropzone = {
            url: '{{ route('admin.galleries.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="featured_image"]').remove()
                $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="featured_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($gallery) && $gallery->featured_image)
                var file = {!! json_encode($gallery->featured_image) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }

    </script>
@endsection
