@can('job_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.jobs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.job.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.job.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userJobs">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.job.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.job_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.job_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.end_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.job_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.is_hourly') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.hour_rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.contact_person_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.contact_person_mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.contact_person_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.desigantion') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.attach_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.attach_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.budget') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.mall_practice') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.skills') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.profile') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.facility') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.min_salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.max_salart') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.over_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.call_required') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.publish') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.travel_expense') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.experience') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $key => $job)
                        <tr data-entry-id="{{ $job->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $job->id ?? '' }}
                            </td>
                            <td>
                                {{ $job->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $job->job_title ?? '' }}
                            </td>
                            <td>
                                {{ $job->job_description ?? '' }}
                            </td>
                            <td>
                                {{ $job->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $job->end_time ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Job::JOB_TYPE_SELECT[$job->job_type] ?? '' }}
                            </td>
                            <td>
                                {{ $job->is_hourly ?? '' }}
                            </td>
                            <td>
                                {{ $job->hour_rate ?? '' }}
                            </td>
                            <td>
                                {{ $job->contact_person_name ?? '' }}
                            </td>
                            <td>
                                {{ $job->contact_person_mobile ?? '' }}
                            </td>
                            <td>
                                {{ $job->contact_person_email ?? '' }}
                            </td>
                            <td>
                                {{ $job->desigantion ?? '' }}
                            </td>
                            <td>
                                {{ $job->attach_1 ?? '' }}
                            </td>
                            <td>
                                {{ $job->attach_2 ?? '' }}
                            </td>
                            <td>
                                {{ $job->budget ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Job::MALL_PRACTICE_SELECT[$job->mall_practice] ?? '' }}
                            </td>
                            <td>
                                @foreach($job->skills as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $job->profile->name ?? '' }}
                            </td>
                            <td>
                                @foreach($job->facilities as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $job->min_salary ?? '' }}
                            </td>
                            <td>
                                {{ $job->max_salart ?? '' }}
                            </td>
                            <td>
                                {{ $job->over_time ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Job::CALL_REQUIRED_SELECT[$job->call_required] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Job::PUBLISH_SELECT[$job->publish] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Job::TRAVEL_EXPENSE_SELECT[$job->travel_expense] ?? '' }}
                            </td>
                            <td>
                                @foreach($job->experiences as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('job_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jobs.show', $job->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('job_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jobs.edit', $job->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('job_delete')
                                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('job_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jobs.massDestroy') }}",
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
  let table = $('.datatable-userJobs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection