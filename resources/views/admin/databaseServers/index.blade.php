@extends('layouts.admin')
@section('content')
@can('database_server_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.database-servers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.databaseServer.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'DatabaseServer', 'route' => 'admin.database-servers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.databaseServer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DatabaseServer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.databaseServer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.databaseServer.fields.server_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.databaseServer.fields.server_ip') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($databaseServers as $key => $databaseServer)
                        <tr data-entry-id="{{ $databaseServer->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $databaseServer->id ?? '' }}
                            </td>
                            <td>
                                {{ $databaseServer->server_name ?? '' }}
                            </td>
                            <td>
                                {{ $databaseServer->server_ip ?? '' }}
                            </td>
                            <td>
                                @can('database_server_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.database-servers.show', $databaseServer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('database_server_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.database-servers.edit', $databaseServer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('database_server_delete')
                                    <form action="{{ route('admin.database-servers.destroy', $databaseServer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('database_server_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.database-servers.massDestroy') }}",
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
  let table = $('.datatable-DatabaseServer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection