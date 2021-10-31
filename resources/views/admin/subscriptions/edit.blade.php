@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subscription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subscriptions.update", [$subscription->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="provider_id">{{ trans('cruds.subscription.fields.provider') }}</label>
                <select class="form-control select2 {{ $errors->has('provider') ? 'is-invalid' : '' }}" name="provider_id" id="provider_id" required>
                    @foreach($providers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('provider_id') ? old('provider_id') : $subscription->provider->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('provider'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provider') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.provider_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="package_id">{{ trans('cruds.subscription.fields.package') }}</label>
                <select class="form-control select2 {{ $errors->has('package') ? 'is-invalid' : '' }}" name="package_id" id="package_id" required>
                    @foreach($packages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('package_id') ? old('package_id') : $subscription->package->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('package'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.package_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.subscription.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $subscription->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.subscription.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $subscription->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.subscription.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $subscription->price) }}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="is_trial">{{ trans('cruds.subscription.fields.is_trial') }}</label>
                <input class="form-control {{ $errors->has('is_trial') ? 'is-invalid' : '' }}" type="number" name="is_trial" id="is_trial" value="{{ old('is_trial', $subscription->is_trial) }}" step="1" required>
                @if($errors->has('is_trial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_trial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.is_trial_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="is_paid">{{ trans('cruds.subscription.fields.is_paid') }}</label>
                <input class="form-control {{ $errors->has('is_paid') ? 'is-invalid' : '' }}" type="number" name="is_paid" id="is_paid" value="{{ old('is_paid', $subscription->is_paid) }}" step="1" required>
                @if($errors->has('is_paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.is_paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="is_trial_expired">{{ trans('cruds.subscription.fields.is_trial_expired') }}</label>
                <input class="form-control {{ $errors->has('is_trial_expired') ? 'is-invalid' : '' }}" type="number" name="is_trial_expired" id="is_trial_expired" value="{{ old('is_trial_expired', $subscription->is_trial_expired) }}" step="1">
                @if($errors->has('is_trial_expired'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_trial_expired') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.is_trial_expired_helper') }}</span>
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