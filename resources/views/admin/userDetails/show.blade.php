@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $userDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.address') }}
                        </th>
                        <td>
                            {{ $userDetail->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.facility') }}
                        </th>
                        <td>
                            {{ $userDetail->facility->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.npi_num') }}
                        </th>
                        <td>
                            {{ $userDetail->npi_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.speciality') }}
                        </th>
                        <td>
                            @foreach($userDetail->specialities as $key => $speciality)
                                <span class="label label-info">{{ $speciality->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.profile') }}
                        </th>
                        <td>
                            {{ $userDetail->profile->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.lat') }}
                        </th>
                        <td>
                            {{ $userDetail->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.lng') }}
                        </th>
                        <td>
                            {{ $userDetail->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.experience') }}
                        </th>
                        <td>
                            {{ $userDetail->experience->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.resume') }}
                        </th>
                        <td>
                            @if($userDetail->resume)
                                <a href="{{ $userDetail->resume->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection