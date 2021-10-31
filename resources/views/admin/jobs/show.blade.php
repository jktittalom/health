@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.job.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.id') }}
                        </th>
                        <td>
                            {{ $job->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.user') }}
                        </th>
                        <td>
                            {{ $job->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.job_title') }}
                        </th>
                        <td>
                            {{ $job->job_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.job_description') }}
                        </th>
                        <td>
                            {{ $job->job_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.start_time') }}
                        </th>
                        <td>
                            {{ $job->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.end_time') }}
                        </th>
                        <td>
                            {{ $job->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.job_type') }}
                        </th>
                        <td>
                            {{ App\Models\Job::JOB_TYPE_SELECT[$job->job_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.is_hourly') }}
                        </th>
                        <td>
                            {{ $job->is_hourly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.hour_rate') }}
                        </th>
                        <td>
                            {{ $job->hour_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.contact_person_name') }}
                        </th>
                        <td>
                            {{ $job->contact_person_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.contact_person_mobile') }}
                        </th>
                        <td>
                            {{ $job->contact_person_mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.contact_person_email') }}
                        </th>
                        <td>
                            {{ $job->contact_person_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.desigantion') }}
                        </th>
                        <td>
                            {{ $job->desigantion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.attach_1') }}
                        </th>
                        <td>
                            {{ $job->attach_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.attach_2') }}
                        </th>
                        <td>
                            {{ $job->attach_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.budget') }}
                        </th>
                        <td>
                            {{ $job->budget }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.mall_practice') }}
                        </th>
                        <td>
                            {{ App\Models\Job::MALL_PRACTICE_SELECT[$job->mall_practice] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.skills') }}
                        </th>
                        <td>
                            @foreach($job->skills as $key => $skills)
                                <span class="label label-info">{{ $skills->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.profile') }}
                        </th>
                        <td>
                            {{ $job->profile->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.facility') }}
                        </th>
                        <td>
                            @foreach($job->facilities as $key => $facility)
                                <span class="label label-info">{{ $facility->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.min_salary') }}
                        </th>
                        <td>
                            {{ $job->min_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.max_salart') }}
                        </th>
                        <td>
                            {{ $job->max_salart }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.over_time') }}
                        </th>
                        <td>
                            {{ $job->over_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.call_required') }}
                        </th>
                        <td>
                            {{ App\Models\Job::CALL_REQUIRED_SELECT[$job->call_required] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.publish') }}
                        </th>
                        <td>
                            {{ App\Models\Job::PUBLISH_SELECT[$job->publish] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.notes') }}
                        </th>
                        <td>
                            {!! $job->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.travel_expense') }}
                        </th>
                        <td>
                            {{ App\Models\Job::TRAVEL_EXPENSE_SELECT[$job->travel_expense] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.experience') }}
                        </th>
                        <td>
                            @foreach($job->experiences as $key => $experience)
                                <span class="label label-info">{{ $experience->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobs.index') }}">
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
            <a class="nav-link" href="#contract_trackers" role="tab" data-toggle="tab">
                {{ trans('cruds.tracker.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contract_job_applieds" role="tab" data-toggle="tab">
                {{ trans('cruds.jobApplied.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="contract_trackers">
            @includeIf('admin.jobs.relationships.contractTrackers', ['trackers' => $job->contractTrackers])
        </div>
        <div class="tab-pane" role="tabpanel" id="contract_job_applieds">
            @includeIf('admin.jobs.relationships.contractJobApplieds', ['jobApplieds' => $job->contractJobApplieds])
        </div>
    </div>
</div>

@endsection