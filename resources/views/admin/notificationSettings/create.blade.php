@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.notificationSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notification-settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.notificationSetting.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notificationSetting.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weekdays">{{ trans('cruds.notificationSetting.fields.weekdays') }}</label>
                <input class="form-control {{ $errors->has('weekdays') ? 'is-invalid' : '' }}" type="text" name="weekdays" id="weekdays" value="{{ old('weekdays', '') }}">
                @if($errors->has('weekdays'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weekdays') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notificationSetting.fields.weekdays_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="all_days">{{ trans('cruds.notificationSetting.fields.all_days') }}</label>
                <input class="form-control {{ $errors->has('all_days') ? 'is-invalid' : '' }}" type="number" name="all_days" id="all_days" value="{{ old('all_days', '0') }}" step="1">
                @if($errors->has('all_days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('all_days') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notificationSetting.fields.all_days_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time">{{ trans('cruds.notificationSetting.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}" required>
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notificationSetting.fields.time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timezone">{{ trans('cruds.notificationSetting.fields.timezone') }}</label>
                <input class="form-control {{ $errors->has('timezone') ? 'is-invalid' : '' }}" type="text" name="timezone" id="timezone" value="{{ old('timezone', '') }}">
                @if($errors->has('timezone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timezone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notificationSetting.fields.timezone_helper') }}</span>
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