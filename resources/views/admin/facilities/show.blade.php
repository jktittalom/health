@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.facility.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.id') }}
                        </th>
                        <td>
                            {{ $facility->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.name') }}
                        </th>
                        <td>
                            {{ $facility->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.address_1') }}
                        </th>
                        <td>
                            {{ $facility->address_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.address_2') }}
                        </th>
                        <td>
                            {{ $facility->address_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.city') }}
                        </th>
                        <td>
                            {{ $facility->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.state') }}
                        </th>
                        <td>
                            {{ $facility->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.postal_code') }}
                        </th>
                        <td>
                            {{ $facility->postal_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.country') }}
                        </th>
                        <td>
                            {{ $facility->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.lat') }}
                        </th>
                        <td>
                            {{ $facility->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.lng') }}
                        </th>
                        <td>
                            {{ $facility->lng }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facilities.index') }}">
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
            <a class="nav-link" href="#facility_user_details" role="tab" data-toggle="tab">
                {{ trans('cruds.userDetail.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#facilty_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#facility_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="facility_user_details">
            @includeIf('admin.facilities.relationships.facilityUserDetails', ['userDetails' => $facility->facilityUserDetails])
        </div>
        <div class="tab-pane" role="tabpanel" id="facilty_users">
            @includeIf('admin.facilities.relationships.faciltyUsers', ['users' => $facility->faciltyUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="facility_jobs">
            @includeIf('admin.facilities.relationships.facilityJobs', ['jobs' => $facility->facilityJobs])
        </div>
    </div>
</div>

@endsection