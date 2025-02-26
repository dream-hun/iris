@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.booking.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.bookings.update', [$booking->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="service_id">{{ trans('cruds.booking.fields.service') }}</label>
                    <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id"
                        id="service_id" required>
                        @foreach ($services as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('service_id') ? old('service_id') : $booking->service->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('service'))
                        <div class="invalid-feedback">
                            {{ $errors->first('service') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.booking.fields.service_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.booking.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                        name="name" id="name" value="{{ old('name', $booking->name) }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.booking.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.booking.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" id="email" value="{{ old('email', $booking->email) }}" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.booking.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="mobile">{{ trans('cruds.booking.fields.mobile') }}</label>
                    <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text"
                        name="mobile" id="mobile" value="{{ old('mobile', $booking->mobile) }}" required>
                    @if ($errors->has('mobile'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mobile') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.booking.fields.mobile_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="date_and_time">{{ trans('cruds.booking.fields.date_and_time') }}</label>
                    <input class="form-control datetime {{ $errors->has('date_and_time') ? 'is-invalid' : '' }}"
                        type="text" name="date_and_time" id="date_and_time"
                        value="{{ old('date_and_time', $booking->date_and_time) }}" required>
                    @if ($errors->has('date_and_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date_and_time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.booking.fields.date_and_time_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.booking.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                        id="status" required>
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Booking::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('status', $booking->status) === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.booking.fields.status_helper') }}</span>
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
