@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.page.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pages.update", [$page->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="home_title">{{ trans('cruds.page.fields.home_title') }}</label>
                <input class="form-control {{ $errors->has('home_title') ? 'is-invalid' : '' }}" type="text" name="home_title" id="home_title" value="{{ old('home_title', $page->home_title) }}">
                @if($errors->has('home_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.home_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_description">{{ trans('cruds.page.fields.home_description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('home_description') ? 'is-invalid' : '' }}" name="home_description" id="home_description">{!! old('home_description', $page->home_description) !!}</textarea>
                @if($errors->has('home_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.home_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_button_text">{{ trans('cruds.page.fields.home_button_text') }}</label>
                <input class="form-control {{ $errors->has('home_button_text') ? 'is-invalid' : '' }}" type="text" name="home_button_text" id="home_button_text" value="{{ old('home_button_text', $page->home_button_text) }}">
                @if($errors->has('home_button_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_button_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.home_button_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_us_header">{{ trans('cruds.page.fields.about_us_header') }}</label>
                <input class="form-control {{ $errors->has('about_us_header') ? 'is-invalid' : '' }}" type="text" name="about_us_header" id="about_us_header" value="{{ old('about_us_header', $page->about_us_header) }}">
                @if($errors->has('about_us_header'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us_header') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.about_us_header_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_us_description">{{ trans('cruds.page.fields.about_us_description') }}</label>
                <textarea class="form-control {{ $errors->has('about_us_description') ? 'is-invalid' : '' }}" name="about_us_description" id="about_us_description">{{ old('about_us_description', $page->about_us_description) }}</textarea>
                @if($errors->has('about_us_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.about_us_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mission_header">{{ trans('cruds.page.fields.mission_header') }}</label>
                <input class="form-control {{ $errors->has('mission_header') ? 'is-invalid' : '' }}" type="text" name="mission_header" id="mission_header" value="{{ old('mission_header', $page->mission_header) }}">
                @if($errors->has('mission_header'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mission_header') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.mission_header_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mission_description">{{ trans('cruds.page.fields.mission_description') }}</label>
                <textarea class="form-control {{ $errors->has('mission_description') ? 'is-invalid' : '' }}" name="mission_description" id="mission_description">{{ old('mission_description', $page->mission_description) }}</textarea>
                @if($errors->has('mission_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mission_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.mission_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vision_header">{{ trans('cruds.page.fields.vision_header') }}</label>
                <input class="form-control {{ $errors->has('vision_header') ? 'is-invalid' : '' }}" type="text" name="vision_header" id="vision_header" value="{{ old('vision_header', $page->vision_header) }}">
                @if($errors->has('vision_header'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vision_header') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.vision_header_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vision_description">{{ trans('cruds.page.fields.vision_description') }}</label>
                <textarea class="form-control {{ $errors->has('vision_description') ? 'is-invalid' : '' }}" name="vision_description" id="vision_description">{{ old('vision_description', $page->vision_description) }}</textarea>
                @if($errors->has('vision_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vision_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.vision_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_us_image">{{ trans('cruds.page.fields.about_us_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('about_us_image') ? 'is-invalid' : '' }}" id="about_us_image-dropzone">
                </div>
                @if($errors->has('about_us_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.about_us_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery_or_portfolio_title">{{ trans('cruds.page.fields.gallery_or_portfolio_title') }}</label>
                <input class="form-control {{ $errors->has('gallery_or_portfolio_title') ? 'is-invalid' : '' }}" type="text" name="gallery_or_portfolio_title" id="gallery_or_portfolio_title" value="{{ old('gallery_or_portfolio_title', $page->gallery_or_portfolio_title) }}">
                @if($errors->has('gallery_or_portfolio_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery_or_portfolio_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.gallery_or_portfolio_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery_or_portfolio_description">{{ trans('cruds.page.fields.gallery_or_portfolio_description') }}</label>
                <input class="form-control {{ $errors->has('gallery_or_portfolio_description') ? 'is-invalid' : '' }}" type="text" name="gallery_or_portfolio_description" id="gallery_or_portfolio_description" value="{{ old('gallery_or_portfolio_description', $page->gallery_or_portfolio_description) }}">
                @if($errors->has('gallery_or_portfolio_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery_or_portfolio_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.gallery_or_portfolio_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="booking_title">{{ trans('cruds.page.fields.booking_title') }}</label>
                <input class="form-control {{ $errors->has('booking_title') ? 'is-invalid' : '' }}" type="text" name="booking_title" id="booking_title" value="{{ old('booking_title', $page->booking_title) }}">
                @if($errors->has('booking_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('booking_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.booking_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="booking_title_description">{{ trans('cruds.page.fields.booking_title_description') }}</label>
                <textarea class="form-control {{ $errors->has('booking_title_description') ? 'is-invalid' : '' }}" name="booking_title_description" id="booking_title_description">{{ old('booking_title_description', $page->booking_title_description) }}</textarea>
                @if($errors->has('booking_title_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('booking_title_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.booking_title_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="booking_title_address">{{ trans('cruds.page.fields.booking_title_address') }}</label>
                <input class="form-control {{ $errors->has('booking_title_address') ? 'is-invalid' : '' }}" type="text" name="booking_title_address" id="booking_title_address" value="{{ old('booking_title_address', $page->booking_title_address) }}">
                @if($errors->has('booking_title_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('booking_title_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.booking_title_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="booking_description_address">{{ trans('cruds.page.fields.booking_description_address') }}</label>
                <input class="form-control {{ $errors->has('booking_description_address') ? 'is-invalid' : '' }}" type="text" name="booking_description_address" id="booking_description_address" value="{{ old('booking_description_address', $page->booking_description_address) }}">
                @if($errors->has('booking_description_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('booking_description_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.booking_description_address_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.pages.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $page->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.aboutUsImageDropzone = {
    url: '{{ route('admin.pages.storeMedia') }}',
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
      $('form').find('input[name="about_us_image"]').remove()
      $('form').append('<input type="hidden" name="about_us_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="about_us_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($page) && $page->about_us_image)
      var file = {!! json_encode($page->about_us_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="about_us_image" value="' + file.file_name + '">')
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
