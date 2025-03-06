@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.service.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.service.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="price">{{ trans('cruds.service.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                        name="price" id="price" value="{{ old('price', '') }}" step="1" required>
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.service.fields.price_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="featured_image">{{ trans('cruds.service.fields.featured_image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}"
                        id="featured_image-dropzone">
                    </div>
                    @if ($errors->has('featured_image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('featured_image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.service.fields.featured_image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="duration">{{ trans('cruds.service.fields.duration') }}</label>
                    <input class="form-control durationpicker {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="text"
                        name="duration" id="duration" value="{{ old('duration') }}" required>
                    @if ($errors->has('duration'))
                        <div class="invalid-feedback">
                            {{ $errors->first('duration') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.service.fields.duration_helper') }}</span>
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
            url: '{{ route('admin.services.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
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
            success: function(file, response) {
                $('form').find('input[name="featured_image"]').remove()
                $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="featured_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($service) && $service->featured_image)
                    var file = {!! json_encode($service->featured_image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
