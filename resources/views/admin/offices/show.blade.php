@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.office.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.office.fields.id') }}
                        </th>
                        <td>
                            {{ $office->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.office.fields.office_name') }}
                        </th>
                        <td>
                            {{ $office->office_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.office.fields.office_desc') }}
                        </th>
                        <td>
                            {{ $office->office_desc }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offices.index') }}">
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
            <a class="nav-link" href="#office_websites" role="tab" data-toggle="tab">
                {{ trans('cruds.website.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="office_websites">
            @includeIf('admin.offices.relationships.officeWebsites', ['websites' => $office->officeWebsites])
        </div>
    </div>
</div>

@endsection