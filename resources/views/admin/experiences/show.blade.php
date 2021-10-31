@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.experience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.id') }}
                        </th>
                        <td>
                            {{ $experience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.name') }}
                        </th>
                        <td>
                            {{ $experience->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Experience::STATUS_SELECT[$experience->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#experience_user_details" role="tab" data-toggle="tab">
                {{ trans('cruds.userDetail.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#experience_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="experience_user_details">
            @includeIf('admin.experiences.relationships.experienceUserDetails', ['userDetails' => $experience->experienceUserDetails])
        </div>
        <div class="tab-pane" role="tabpanel" id="experience_jobs">
            @includeIf('admin.experiences.relationships.experienceJobs', ['jobs' => $experience->experienceJobs])
        </div>
    </div>
</div>

@endsection