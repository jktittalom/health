@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.speciality.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.specialities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.speciality.fields.id') }}
                        </th>
                        <td>
                            {{ $speciality->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.speciality.fields.name') }}
                        </th>
                        <td>
                            {{ $speciality->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.speciality.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Speciality::STATUS_SELECT[$speciality->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.specialities.index') }}">
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
            <a class="nav-link" href="#speciality_user_details" role="tab" data-toggle="tab">
                {{ trans('cruds.userDetail.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#skills_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="speciality_user_details">
            @includeIf('admin.specialities.relationships.specialityUserDetails', ['userDetails' => $speciality->specialityUserDetails])
        </div>
        <div class="tab-pane" role="tabpanel" id="skills_jobs">
            @includeIf('admin.specialities.relationships.skillsJobs', ['jobs' => $speciality->skillsJobs])
        </div>
    </div>
</div>

@endsection