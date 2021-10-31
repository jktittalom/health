@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.device_type') }}
                        </th>
                        <td>
                            {{ $user->device_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.device_token') }}
                        </th>
                        <td>
                            {{ $user->device_token }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\User::STATUS_SELECT[$user->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.mall_practice') }}
                        </th>
                        <td>
                            {{ App\Models\User::MALL_PRACTICE_SELECT[$user->mall_practice] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.user_type') }}
                        </th>
                        <td>
                            {{ App\Models\User::USER_TYPE_SELECT[$user->user_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.facilty') }}
                        </th>
                        <td>
                            @foreach($user->facilties as $key => $facilty)
                                <span class="label label-info">{{ $facilty->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#user_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#client_trackers" role="tab" data-toggle="tab">
                {{ trans('cruds.tracker.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_notification_settings" role="tab" data-toggle="tab">
                {{ trans('cruds.notificationSetting.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#provider_job_applieds" role="tab" data-toggle="tab">
                {{ trans('cruds.jobApplied.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#provider_subscriptions" role="tab" data-toggle="tab">
                {{ trans('cruds.subscription.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_jobs">
            @includeIf('admin.users.relationships.userJobs', ['jobs' => $user->userJobs])
        </div>
        <div class="tab-pane" role="tabpanel" id="client_trackers">
            @includeIf('admin.users.relationships.clientTrackers', ['trackers' => $user->clientTrackers])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_notification_settings">
            @includeIf('admin.users.relationships.userNotificationSettings', ['notificationSettings' => $user->userNotificationSettings])
        </div>
        <div class="tab-pane" role="tabpanel" id="provider_job_applieds">
            @includeIf('admin.users.relationships.providerJobApplieds', ['jobApplieds' => $user->providerJobApplieds])
        </div>
        <div class="tab-pane" role="tabpanel" id="provider_subscriptions">
            @includeIf('admin.users.relationships.providerSubscriptions', ['subscriptions' => $user->providerSubscriptions])
        </div>
    </div>
</div>

@endsection