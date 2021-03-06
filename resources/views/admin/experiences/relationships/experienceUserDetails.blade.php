@can('user_detail_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.user-details.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.userDetail.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.userDetail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-experienceUserDetails">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.facility') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.npi_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.speciality') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.profile') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.experience') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDetail.fields.resume') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userDetails as $key => $userDetail)
                        <tr data-entry-id="{{ $userDetail->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $userDetail->id ?? '' }}
                            </td>
                            <td>
                                {{ $userDetail->address ?? '' }}
                            </td>
                            <td>
                                {{ $userDetail->facility->name ?? '' }}
                            </td>
                            <td>
                                {{ $userDetail->npi_num ?? '' }}
                            </td>
                            <td>
                                @foreach($userDetail->specialities as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $userDetail->profile->name ?? '' }}
                            </td>
                            <td>
                                {{ $userDetail->lat ?? '' }}
                            </td>
                            <td>
                                {{ $userDetail->lng ?? '' }}
                            </td>
                            <td>
                                {{ $userDetail->experience->name ?? '' }}
                            </td>
                            <td>
                                @if($userDetail->resume)
                                    <a href="{{ $userDetail->resume->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('user_detail_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.user-details.show', $userDetail->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_detail_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.user-details.edit', $userDetail->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_detail_delete')
                                    <form action="{{ route('admin.user-details.destroy', $userDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user-details.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-experienceUserDetails:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection