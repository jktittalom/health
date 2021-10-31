@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tracker.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trackers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.tracker.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tracker.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contract_id">{{ trans('cruds.tracker.fields.contract') }}</label>
                <select class="form-control select2 {{ $errors->has('contract') ? 'is-invalid' : '' }}" name="contract_id" id="contract_id" required>
                    @foreach($contracts as $id => $entry)
                        <option value="{{ $id }}" {{ old('contract_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contract'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tracker.fields.contract_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="view">{{ trans('cruds.tracker.fields.view') }}</label>
                <input class="form-control {{ $errors->has('view') ? 'is-invalid' : '' }}" type="number" name="view" id="view" value="{{ old('view', '0') }}" step="1">
                @if($errors->has('view'))
                    <div class="invalid-feedback">
                        {{ $errors->first('view') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tracker.fields.view_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="view_users">{{ trans('cruds.tracker.fields.view_users') }}</label>
                <textarea class="form-control {{ $errors->has('view_users') ? 'is-invalid' : '' }}" name="view_users" id="view_users">{{ old('view_users') }}</textarea>
                @if($errors->has('view_users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('view_users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tracker.fields.view_users_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="click">{{ trans('cruds.tracker.fields.click') }}</label>
                <input class="form-control {{ $errors->has('click') ? 'is-invalid' : '' }}" type="number" name="click" id="click" value="{{ old('click', '0') }}" step="1">
                @if($errors->has('click'))
                    <div class="invalid-feedback">
                        {{ $errors->first('click') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tracker.fields.click_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="click_users">{{ trans('cruds.tracker.fields.click_users') }}</label>
                <textarea class="form-control {{ $errors->has('click_users') ? 'is-invalid' : '' }}" name="click_users" id="click_users">{{ old('click_users') }}</textarea>
                @if($errors->has('click_users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('click_users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tracker.fields.click_users_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="applied">{{ trans('cruds.tracker.fields.applied') }}</label>
                <input class="form-control {{ $errors->has('applied') ? 'is-invalid' : '' }}" type="number" name="applied" id="applied" value="{{ old('applied', '0') }}" step="1">
                @if($errors->has('applied'))
                    <div class="invalid-feedback">
                        {{ $errors->first('applied') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tracker.fields.applied_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="applied_users">{{ trans('cruds.tracker.fields.applied_users') }}</label>
                <textarea class="form-control {{ $errors->has('applied_users') ? 'is-invalid' : '' }}" name="applied_users" id="applied_users">{{ old('applied_users') }}</textarea>
                @if($errors->has('applied_users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('applied_users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tracker.fields.applied_users_helper') }}</span>
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