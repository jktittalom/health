@can('job_applied_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.job-applieds.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jobApplied.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.jobApplied.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-contractJobApplieds">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jobApplied.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplied.fields.contract') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplied.fields.provider') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplied.fields.applied_date_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplied.fields.contract_end_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplied.fields.is_cancelled') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplied.fields.cancelled_date_time') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobApplieds as $key => $jobApplied)
                        <tr data-entry-id="{{ $jobApplied->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jobApplied->id ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplied->contract->job_title ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplied->provider->name ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplied->applied_date_time ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplied->contract_end_time ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplied->is_cancelled ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplied->cancelled_date_time ?? '' }}
                            </td>
                            <td>
                                @can('job_applied_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.job-applieds.show', $jobApplied->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('job_applied_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.job-applieds.edit', $jobApplied->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('job_applied_delete')
                                    <form action="{{ route('admin.job-applieds.destroy', $jobApplied->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('job_applied_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.job-applieds.massDestroy') }}",
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
  let table = $('.datatable-contractJobApplieds:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection