@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.webServer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.web-servers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.webServer.fields.id') }}
                        </th>
                        <td>
                            {{ $webServer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.webServer.fields.server_name') }}
                        </th>
                        <td>
                            {{ $webServer->server_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.webServer.fields.ip_address') }}
                        </th>
                        <td>
                            {{ $webServer->ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.webServer.fields.operating_system') }}
                        </th>
                        <td>
                            {{ $webServer->operating_system }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.web-servers.index') }}">
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
            <a class="nav-link" href="#hosting_server_websites" role="tab" data-toggle="tab">
                {{ trans('cruds.website.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="hosting_server_websites">
            @includeIf('admin.webServers.relationships.hostingServerWebsites', ['websites' => $webServer->hostingServerWebsites])
        </div>
    </div>
</div>

@endsection