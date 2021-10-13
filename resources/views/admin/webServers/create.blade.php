@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.webServer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.web-servers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="server_name">{{ trans('cruds.webServer.fields.server_name') }}</label>
                <input class="form-control {{ $errors->has('server_name') ? 'is-invalid' : '' }}" type="text" name="server_name" id="server_name" value="{{ old('server_name', '') }}" required>
                @if($errors->has('server_name'))
                    <span class="text-danger">{{ $errors->first('server_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.webServer.fields.server_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ip_address">{{ trans('cruds.webServer.fields.ip_address') }}</label>
                <input class="form-control {{ $errors->has('ip_address') ? 'is-invalid' : '' }}" type="text" name="ip_address" id="ip_address" value="{{ old('ip_address', '') }}" required>
                @if($errors->has('ip_address'))
                    <span class="text-danger">{{ $errors->first('ip_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.webServer.fields.ip_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="operating_system">{{ trans('cruds.webServer.fields.operating_system') }}</label>
                <input class="form-control {{ $errors->has('operating_system') ? 'is-invalid' : '' }}" type="text" name="operating_system" id="operating_system" value="{{ old('operating_system', '') }}">
                @if($errors->has('operating_system'))
                    <span class="text-danger">{{ $errors->first('operating_system') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.webServer.fields.operating_system_helper') }}</span>
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