@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobApplied.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-applieds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplied.fields.id') }}
                        </th>
                        <td>
                            {{ $jobApplied->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplied.fields.contract') }}
                        </th>
                        <td>
                            {{ $jobApplied->contract->job_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplied.fields.provider') }}
                        </th>
                        <td>
                            {{ $jobApplied->provider->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplied.fields.applied_date_time') }}
                        </th>
                        <td>
                            {{ $jobApplied->applied_date_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplied.fields.contract_end_time') }}
                        </th>
                        <td>
                            {{ $jobApplied->contract_end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplied.fields.is_cancelled') }}
                        </th>
                        <td>
                            {{ $jobApplied->is_cancelled }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplied.fields.cancelled_date_time') }}
                        </th>
                        <td>
                            {{ $jobApplied->cancelled_date_time }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-applieds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection