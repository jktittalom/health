@can('notification_setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.notification-settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.notificationSetting.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.notificationSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userNotificationSettings">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.weekdays') }}
                        </th>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.all_days') }}
                        </th>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.time') }}
                        </th>
                        <th>
                            {{ trans('cruds.notificationSetting.fields.timezone') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notificationSettings as $key => $notificationSetting)
                        <tr data-entry-id="{{ $notificationSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $notificationSetting->id ?? '' }}
                            </td>
                            <td>
                                {{ $notificationSetting->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $notificationSetting->weekdays ?? '' }}
                            </td>
                            <td>
                                {{ $notificationSetting->all_days ?? '' }}
                            </td>
                            <td>
                                {{ $notificationSetting->time ?? '' }}
                            </td>
                            <td>
                                {{ $notificationSetting->timezone ?? '' }}
                            </td>
                            <td>
                                @can('notification_setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.notification-settings.show', $notificationSetting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('notification_setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.notification-settings.edit', $notificationSetting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('notification_setting_delete')
                                    <form action="{{ route('admin.notification-settings.destroy', $notificationSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('notification_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.notification-settings.massDestroy') }}",
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
  let table = $('.datatable-userNotificationSettings:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection