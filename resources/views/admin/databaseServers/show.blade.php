@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.databaseServer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.database-servers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.databaseServer.fields.id') }}
                        </th>
                        <td>
                            {{ $databaseServer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.databaseServer.fields.server_name') }}
                        </th>
                        <td>
                            {{ $databaseServer->server_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.databaseServer.fields.server_ip') }}
                        </th>
                        <td>
                            {{ $databaseServer->server_ip }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.database-servers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#database_server_websites" role="tab" data-toggle="tab">
                {{ trans('cruds.website.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="database_server_websites">
            @includeIf('admin.databaseServers.relationships.databaseServerWebsites', ['websites' => $databaseServer->databaseServerWebsites])
        </div>
    </div>
</div>

@endsection