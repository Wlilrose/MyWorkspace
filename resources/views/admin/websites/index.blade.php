@extends('layouts.admin')
@section('content')
@can('website_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.websites.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.website.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.website.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Website">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.website.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.web_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.office') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.date_uploaded') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.hosting_server') }}
                        </th>
                        <th>
                            {{ trans('cruds.webServer.fields.ip_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.config_file_location') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.database_server') }}
                        </th>
                        <th>
                            {{ trans('cruds.databaseServer.fields.server_ip') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.platform') }}
                        </th>
                        <th>
                            {{ trans('cruds.website.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($websites as $key => $website)
                        <tr data-entry-id="{{ $website->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $website->id ?? '' }}
                            </td>
                            <td>
                                {{ $website->web_url ?? '' }}
                            </td>
                            <td>
                                {{ $website->office->office_name ?? '' }}
                            </td>
                            <td>
                                {{ $website->status ?? '' }}
                            </td>
                            <td>
                                {{ $website->date_uploaded ?? '' }}
                            </td>
                            <td>
                                {{ $website->hosting_server->server_name ?? '' }}
                            </td>
                            <td>
                                {{ $website->hosting_server->ip_address ?? '' }}
                            </td>
                            <td>
                                {{ $website->config_file_location ?? '' }}
                            </td>
                            <td>
                                {{ $website->database_server->server_name ?? '' }}
                            </td>
                            <td>
                                {{ $website->database_server->server_ip ?? '' }}
                            </td>
                            <td>
                                {{ $website->platform->name ?? '' }}
                            </td>
                            <td>
                                {{ $website->remarks ?? '' }}
                            </td>
                            <td>
                                @can('website_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.websites.show', $website->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('website_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.websites.edit', $website->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('website_delete')
                                    <form action="{{ route('admin.websites.destroy', $website->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('website_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.websites.massDestroy') }}",
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
  let table = $('.datatable-Website:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection