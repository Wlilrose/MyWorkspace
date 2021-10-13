@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.website.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.websites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.id') }}
                        </th>
                        <td>
                            {{ $website->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.web_url') }}
                        </th>
                        <td>
                            {{ $website->web_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.office') }}
                        </th>
                        <td>
                            {{ $website->office->office_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.status') }}
                        </th>
                        <td>
                            {{ $website->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.date_uploaded') }}
                        </th>
                        <td>
                            {{ $website->date_uploaded }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.hosting_server') }}
                        </th>
                        <td>
                            {{ $website->hosting_server->server_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.config_file_location') }}
                        </th>
                        <td>
                            {{ $website->config_file_location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.database_server') }}
                        </th>
                        <td>
                            {{ $website->database_server->server_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.platform') }}
                        </th>
                        <td>
                            {{ $website->platform->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.web_version') }}
                        </th>
                        <td>
                            {{ $website->web_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.admin_url') }}
                        </th>
                        <td>
                            {{ $website->admin_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.admin_password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.site_template') }}
                        </th>
                        <td>
                            {{ $website->site_template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.favicon') }}
                        </th>
                        <td>
                            {{ $website->favicon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.remarks') }}
                        </th>
                        <td>
                            {{ $website->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.date_last_check') }}
                        </th>
                        <td>
                            {{ $website->date_last_check }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.websites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection