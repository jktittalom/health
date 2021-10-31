@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tracker.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trackers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.id') }}
                        </th>
                        <td>
                            {{ $tracker->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.client') }}
                        </th>
                        <td>
                            {{ $tracker->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.contract') }}
                        </th>
                        <td>
                            {{ $tracker->contract->job_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.view') }}
                        </th>
                        <td>
                            {{ $tracker->view }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.view_users') }}
                        </th>
                        <td>
                            {{ $tracker->view_users }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.click') }}
                        </th>
                        <td>
                            {{ $tracker->click }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.click_users') }}
                        </th>
                        <td>
                            {{ $tracker->click_users }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.applied') }}
                        </th>
                        <td>
                            {{ $tracker->applied }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracker.fields.applied_users') }}
                        </th>
                        <td>
                            {{ $tracker->applied_users }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trackers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection