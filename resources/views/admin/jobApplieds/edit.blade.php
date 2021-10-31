@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jobApplied.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.job-applieds.update", [$jobApplied->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="contract_id">{{ trans('cruds.jobApplied.fields.contract') }}</label>
                <select class="form-control select2 {{ $errors->has('contract') ? 'is-invalid' : '' }}" name="contract_id" id="contract_id" required>
                    @foreach($contracts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('contract_id') ? old('contract_id') : $jobApplied->contract->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contract'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplied.fields.contract_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="provider_id">{{ trans('cruds.jobApplied.fields.provider') }}</label>
                <select class="form-control select2 {{ $errors->has('provider') ? 'is-invalid' : '' }}" name="provider_id" id="provider_id" required>
                    @foreach($providers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('provider_id') ? old('provider_id') : $jobApplied->provider->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('provider'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provider') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplied.fields.provider_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="applied_date_time">{{ trans('cruds.jobApplied.fields.applied_date_time') }}</label>
                <input class="form-control datetime {{ $errors->has('applied_date_time') ? 'is-invalid' : '' }}" type="text" name="applied_date_time" id="applied_date_time" value="{{ old('applied_date_time', $jobApplied->applied_date_time) }}" required>
                @if($errors->has('applied_date_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('applied_date_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplied.fields.applied_date_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contract_end_time">{{ trans('cruds.jobApplied.fields.contract_end_time') }}</label>
                <input class="form-control datetime {{ $errors->has('contract_end_time') ? 'is-invalid' : '' }}" type="text" name="contract_end_time" id="contract_end_time" value="{{ old('contract_end_time', $jobApplied->contract_end_time) }}">
                @if($errors->has('contract_end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract_end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplied.fields.contract_end_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="is_cancelled">{{ trans('cruds.jobApplied.fields.is_cancelled') }}</label>
                <input class="form-control {{ $errors->has('is_cancelled') ? 'is-invalid' : '' }}" type="number" name="is_cancelled" id="is_cancelled" value="{{ old('is_cancelled', $jobApplied->is_cancelled) }}" step="1">
                @if($errors->has('is_cancelled'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_cancelled') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplied.fields.is_cancelled_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cancelled_date_time">{{ trans('cruds.jobApplied.fields.cancelled_date_time') }}</label>
                <input class="form-control datetime {{ $errors->has('cancelled_date_time') ? 'is-invalid' : '' }}" type="text" name="cancelled_date_time" id="cancelled_date_time" value="{{ old('cancelled_date_time', $jobApplied->cancelled_date_time) }}">
                @if($errors->has('cancelled_date_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cancelled_date_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplied.fields.cancelled_date_time_helper') }}</span>
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