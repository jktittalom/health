@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.providerType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provider-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.providerType.fields.id') }}
                        </th>
                        <td>
                            {{ $providerType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.providerType.fields.name') }}
                        </th>
                        <td>
                            {{ $providerType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.providerType.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\ProviderType::STATUS_SELECT[$providerType->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provider-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection