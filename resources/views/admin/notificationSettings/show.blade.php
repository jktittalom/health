@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.notificationSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notification-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $notificationSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.user') }}
                        </th>
                        <td>
                            {{ $notificationSetting->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.weekdays') }}
                        </th>
                        <td>
                            {{ $notificationSetting->weekdays }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.all_days') }}
                        </th>
                        <td>
                            {{ $notificationSetting->all_days }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.time') }}
                        </th>
                        <td>
                            {{ $notificationSetting->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.timezone') }}
                        </th>
                        <td>
                            {{ $notificationSetting->timezone }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notification-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection