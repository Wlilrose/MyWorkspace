@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.databaseServer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.database-servers.update", [$databaseServer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="server_name">{{ trans('cruds.databaseServer.fields.server_name') }}</label>
                <input class="form-control {{ $errors->has('server_name') ? 'is-invalid' : '' }}" type="text" name="server_name" id="server_name" value="{{ old('server_name', $databaseServer->server_name) }}" required>
                @if($errors->has('server_name'))
                    <span class="text-danger">{{ $errors->first('server_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.databaseServer.fields.server_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="server_ip">{{ trans('cruds.databaseServer.fields.server_ip') }}</label>
                <input class="form-control {{ $errors->has('server_ip') ? 'is-invalid' : '' }}" type="text" name="server_ip" id="server_ip" value="{{ old('server_ip', $databaseServer->server_ip) }}" required>
                @if($errors->has('server_ip'))
                    <span class="text-danger">{{ $errors->first('server_ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.databaseServer.fields.server_ip_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection