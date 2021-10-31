@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.userDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="address">{{ trans('cruds.userDetail.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facility_id">{{ trans('cruds.userDetail.fields.facility') }}</label>
                <select class="form-control select2 {{ $errors->has('facility') ? 'is-invalid' : '' }}" name="facility_id" id="facility_id">
                    @foreach($facilities as $id => $entry)
                        <option value="{{ $id }}" {{ old('facility_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('facility'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facility') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.facility_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="npi_num">{{ trans('cruds.userDetail.fields.npi_num') }}</label>
                <input class="form-control {{ $errors->has('npi_num') ? 'is-invalid' : '' }}" type="text" name="npi_num" id="npi_num" value="{{ old('npi_num', '') }}">
                @if($errors->has('npi_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('npi_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.npi_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="specialities">{{ trans('cruds.userDetail.fields.speciality') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('specialities') ? 'is-invalid' : '' }}" name="specialities[]" id="specialities" multiple>
                    @foreach($specialities as $id => $speciality)
                        <option value="{{ $id }}" {{ in_array($id, old('specialities', [])) ? 'selected' : '' }}>{{ $speciality }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialities'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialities') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.speciality_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile_id">{{ trans('cruds.userDetail.fields.profile') }}</label>
                <select class="form-control select2 {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile_id" id="profile_id">
                    @foreach($profiles as $id => $entry)
                        <option value="{{ $id }}" {{ old('profile_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('profile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.profile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.userDetail.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}">
                @if($errors->has('lat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lng">{{ trans('cruds.userDetail.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng" id="lng" value="{{ old('lng', '') }}">
                @if($errors->has('lng'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lng') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="experience_id">{{ trans('cruds.userDetail.fields.experience') }}</label>
                <select class="form-control select2 {{ $errors->has('experience') ? 'is-invalid' : '' }}" name="experience_id" id="experience_id">
                    @foreach($experiences as $id => $entry)
                        <option value="{{ $id }}" {{ old('experience_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resume">{{ trans('cruds.userDetail.fields.resume') }}</label>
                <div class="needsclick dropzone {{ $errors->has('resume') ? 'is-invalid' : '' }}" id="resume-dropzone">
                </div>
                @if($errors->has('resume'))
                    <div class="invalid-feedback">
                        {{ $errors->first('resume') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.resume_helper') }}</span>
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
    Dropzone.options.resumeDropzone = {
    url: '{{ route('admin.user-details.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="resume"]').remove()
      $('form').append('<input type="hidden" name="resume" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="resume"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($userDetail) && $userDetail->resume)
      var file = {!! json_encode($userDetail->resume) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="resume" value="' + file.file_name + '">')
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