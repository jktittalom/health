@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="device_type">{{ trans('cruds.user.fields.device_type') }}</label>
                <input class="form-control {{ $errors->has('device_type') ? 'is-invalid' : '' }}" type="text" name="device_type" id="device_type" value="{{ old('device_type', '') }}">
                @if($errors->has('device_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('device_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.device_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="device_token">{{ trans('cruds.user.fields.device_token') }}</label>
                <input class="form-control {{ $errors->has('device_token') ? 'is-invalid' : '' }}" type="text" name="device_token" id="device_token" value="{{ old('device_token', '') }}">
                @if($errors->has('device_token'))
                    <div class="invalid-feedback">
                        {{ $errors->first('device_token') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.device_token_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.user.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.mall_practice') }}</label>
                <select class="form-control {{ $errors->has('mall_practice') ? 'is-invalid' : '' }}" name="mall_practice" id="mall_practice">
                    <option value disabled {{ old('mall_practice', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::MALL_PRACTICE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mall_practice', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mall_practice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mall_practice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.mall_practice_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.user.fields.user_type') }}</label>
                <select class="form-control {{ $errors->has('user_type') ? 'is-invalid' : '' }}" name="user_type" id="user_type" required>
                    <option value disabled {{ old('user_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::USER_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('user_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.user_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="facilties">{{ trans('cruds.user.fields.facilty') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('facilties') ? 'is-invalid' : '' }}" name="facilties[]" id="facilties" multiple required>
                    @foreach($facilties as $id => $facilty)
                        <option value="{{ $id }}" {{ in_array($id, old('facilties', [])) ? 'selected' : '' }}>{{ $facilty }}</option>
                    @endforeach
                </select>
                @if($errors->has('facilties'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facilties') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.facilty_helper') }}</span>
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