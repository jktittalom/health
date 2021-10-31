@extends('layouts.admin')
@section('content')
@can('tracker_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.trackers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tracker.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tracker.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tracker">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.contract') }}
                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.view') }}
                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.view_users') }}
                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.click') }}
                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.click_users') }}
                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.applied') }}
                        </th>
                        <th>
                            {{ trans('cruds.tracker.fields.applied_users') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($jobs as $key => $item)
                                    <option value="{{ $item->job_title }}">{{ $item->job_title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trackers as $key => $tracker)
                        <tr data-entry-id="{{ $tracker->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tracker->id ?? '' }}
                            </td>
                            <td>
                                {{ $tracker->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $tracker->contract->job_title ?? '' }}
                            </td>
                            <td>
                                {{ $tracker->view ?? '' }}
                            </td>
                            <td>
                                {{ $tracker->view_users ?? '' }}
                            </td>
                            <td>
                                {{ $tracker->click ?? '' }}
                            </td>
                            <td>
                                {{ $tracker->click_users ?? '' }}
                            </td>
                            <td>
                                {{ $tracker->applied ?? '' }}
                            </td>
                            <td>
                                {{ $tracker->applied_users ?? '' }}
                            </td>
                            <td>
                                @can('tracker_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trackers.show', $tracker->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tracker_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trackers.edit', $tracker->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tracker_delete')
                                    <form action="{{ route('admin.trackers.destroy', $tracker->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tracker_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trackers.massDestroy') }}",
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
  let table = $('.datatable-Tracker:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection