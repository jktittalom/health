@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.job.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jobs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.job.fields.user') }}</label>
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
                <span class="help-block">{{ trans('cruds.job.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="job_title">{{ trans('cruds.job.fields.job_title') }}</label>
                <input class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}" type="text" name="job_title" id="job_title" value="{{ old('job_title', '') }}" required>
                @if($errors->has('job_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.job_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_description">{{ trans('cruds.job.fields.job_description') }}</label>
                <input class="form-control {{ $errors->has('job_description') ? 'is-invalid' : '' }}" type="text" name="job_description" id="job_description" value="{{ old('job_description', '') }}">
                @if($errors->has('job_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.job_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.job.fields.start_time') }}</label>
                <input class="form-control datetime {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_time">{{ trans('cruds.job.fields.end_time') }}</label>
                <input class="form-control datetime {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                @if($errors->has('end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.end_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.job.fields.job_type') }}</label>
                <select class="form-control {{ $errors->has('job_type') ? 'is-invalid' : '' }}" name="job_type" id="job_type" required>
                    <option value disabled {{ old('job_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Job::JOB_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('job_type', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('job_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.job_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="is_hourly">{{ trans('cruds.job.fields.is_hourly') }}</label>
                <input class="form-control {{ $errors->has('is_hourly') ? 'is-invalid' : '' }}" type="number" name="is_hourly" id="is_hourly" value="{{ old('is_hourly', '0') }}" step="1">
                @if($errors->has('is_hourly'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_hourly') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.is_hourly_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hour_rate">{{ trans('cruds.job.fields.hour_rate') }}</label>
                <input class="form-control {{ $errors->has('hour_rate') ? 'is-invalid' : '' }}" type="number" name="hour_rate" id="hour_rate" value="{{ old('hour_rate', '') }}" step="1">
                @if($errors->has('hour_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hour_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.hour_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact_person_name">{{ trans('cruds.job.fields.contact_person_name') }}</label>
                <input class="form-control {{ $errors->has('contact_person_name') ? 'is-invalid' : '' }}" type="text" name="contact_person_name" id="contact_person_name" value="{{ old('contact_person_name', '') }}" required>
                @if($errors->has('contact_person_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_person_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.contact_person_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_person_mobile">{{ trans('cruds.job.fields.contact_person_mobile') }}</label>
                <input class="form-control {{ $errors->has('contact_person_mobile') ? 'is-invalid' : '' }}" type="text" name="contact_person_mobile" id="contact_person_mobile" value="{{ old('contact_person_mobile', '') }}">
                @if($errors->has('contact_person_mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_person_mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.contact_person_mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_person_email">{{ trans('cruds.job.fields.contact_person_email') }}</label>
                <input class="form-control {{ $errors->has('contact_person_email') ? 'is-invalid' : '' }}" type="text" name="contact_person_email" id="contact_person_email" value="{{ old('contact_person_email', '') }}">
                @if($errors->has('contact_person_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_person_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.contact_person_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desigantion">{{ trans('cruds.job.fields.desigantion') }}</label>
                <input class="form-control {{ $errors->has('desigantion') ? 'is-invalid' : '' }}" type="text" name="desigantion" id="desigantion" value="{{ old('desigantion', '') }}">
                @if($errors->has('desigantion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desigantion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.desigantion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attach_1">{{ trans('cruds.job.fields.attach_1') }}</label>
                <input class="form-control {{ $errors->has('attach_1') ? 'is-invalid' : '' }}" type="text" name="attach_1" id="attach_1" value="{{ old('attach_1', '') }}">
                @if($errors->has('attach_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attach_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.attach_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attach_2">{{ trans('cruds.job.fields.attach_2') }}</label>
                <input class="form-control {{ $errors->has('attach_2') ? 'is-invalid' : '' }}" type="text" name="attach_2" id="attach_2" value="{{ old('attach_2', '') }}">
                @if($errors->has('attach_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attach_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.attach_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="budget">{{ trans('cruds.job.fields.budget') }}</label>
                <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="text" name="budget" id="budget" value="{{ old('budget', '') }}">
                @if($errors->has('budget'))
                    <div class="invalid-feedback">
                        {{ $errors->first('budget') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.budget_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.job.fields.mall_practice') }}</label>
                <select class="form-control {{ $errors->has('mall_practice') ? 'is-invalid' : '' }}" name="mall_practice" id="mall_practice">
                    <option value disabled {{ old('mall_practice', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Job::MALL_PRACTICE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mall_practice', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mall_practice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mall_practice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.mall_practice_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="skills">{{ trans('cruds.job.fields.skills') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple required>
                    @foreach($skills as $id => $skill)
                        <option value="{{ $id }}" {{ in_array($id, old('skills', [])) ? 'selected' : '' }}>{{ $skill }}</option>
                    @endforeach
                </select>
                @if($errors->has('skills'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skills') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.skills_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="profile_id">{{ trans('cruds.job.fields.profile') }}</label>
                <select class="form-control select2 {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile_id" id="profile_id" required>
                    @foreach($profiles as $id => $entry)
                        <option value="{{ $id }}" {{ old('profile_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('profile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.profile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="facilities">{{ trans('cruds.job.fields.facility') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('facilities') ? 'is-invalid' : '' }}" name="facilities[]" id="facilities" multiple required>
                    @foreach($facilities as $id => $facility)
                        <option value="{{ $id }}" {{ in_array($id, old('facilities', [])) ? 'selected' : '' }}>{{ $facility }}</option>
                    @endforeach
                </select>
                @if($errors->has('facilities'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facilities') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.facility_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="min_salary">{{ trans('cruds.job.fields.min_salary') }}</label>
                <input class="form-control {{ $errors->has('min_salary') ? 'is-invalid' : '' }}" type="text" name="min_salary" id="min_salary" value="{{ old('min_salary', '') }}" required>
                @if($errors->has('min_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.min_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="max_salart">{{ trans('cruds.job.fields.max_salart') }}</label>
                <input class="form-control {{ $errors->has('max_salart') ? 'is-invalid' : '' }}" type="text" name="max_salart" id="max_salart" value="{{ old('max_salart', '') }}" required>
                @if($errors->has('max_salart'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_salart') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.max_salart_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="over_time">{{ trans('cruds.job.fields.over_time') }}</label>
                <input class="form-control {{ $errors->has('over_time') ? 'is-invalid' : '' }}" type="text" name="over_time" id="over_time" value="{{ old('over_time', '') }}">
                @if($errors->has('over_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('over_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.over_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.job.fields.call_required') }}</label>
                <select class="form-control {{ $errors->has('call_required') ? 'is-invalid' : '' }}" name="call_required" id="call_required">
                    <option value disabled {{ old('call_required', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Job::CALL_REQUIRED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('call_required', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('call_required'))
                    <div class="invalid-feedback">
                        {{ $errors->first('call_required') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.call_required_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.job.fields.publish') }}</label>
                <select class="form-control {{ $errors->has('publish') ? 'is-invalid' : '' }}" name="publish" id="publish" required>
                    <option value disabled {{ old('publish', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Job::PUBLISH_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('publish', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('publish'))
                    <div class="invalid-feedback">
                        {{ $errors->first('publish') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.publish_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.job.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.job.fields.travel_expense') }}</label>
                <select class="form-control {{ $errors->has('travel_expense') ? 'is-invalid' : '' }}" name="travel_expense" id="travel_expense" required>
                    <option value disabled {{ old('travel_expense', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Job::TRAVEL_EXPENSE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('travel_expense', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('travel_expense'))
                    <div class="invalid-feedback">
                        {{ $errors->first('travel_expense') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.travel_expense_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="experiences">{{ trans('cruds.job.fields.experience') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('experiences') ? 'is-invalid' : '' }}" name="experiences[]" id="experiences" multiple required>
                    @foreach($experiences as $id => $experience)
                        <option value="{{ $id }}" {{ in_array($id, old('experiences', [])) ? 'selected' : '' }}>{{ $experience }}</option>
                    @endforeach
                </select>
                @if($errors->has('experiences'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experiences') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.experience_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.jobs.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $job->id ?? 0 }}');
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

@endsection