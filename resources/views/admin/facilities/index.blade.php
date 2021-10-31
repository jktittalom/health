@extends('layouts.admin')
@section('content')
@can('facility_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.facilities.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.facility.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.facility.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Facility">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.address_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.address_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.postal_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.lng') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facilities as $key => $facility)
                        <tr data-entry-id="{{ $facility->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $facility->id ?? '' }}
                            </td>
                            <td>
                                {{ $facility->name ?? '' }}
                            </td>
                            <td>
                                {{ $facility->address_1 ?? '' }}
                            </td>
                            <td>
                                {{ $facility->address_2 ?? '' }}
                            </td>
                            <td>
                                {{ $facility->city ?? '' }}
                            </td>
                            <td>
                                {{ $facility->state ?? '' }}
                            </td>
                            <td>
                                {{ $facility->postal_code ?? '' }}
                            </td>
                            <td>
                                {{ $facility->country ?? '' }}
                            </td>
                            <td>
                                {{ $facility->lat ?? '' }}
                            </td>
                            <td>
                                {{ $facility->lng ?? '' }}
                            </td>
                            <td>
                                @can('facility_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.facilities.show', $facility->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('facility_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.facilities.edit', $facility->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('facility_delete')
                                    <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('facility_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.facilities.massDestroy') }}",
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
  let table = $('.datatable-Facility:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection