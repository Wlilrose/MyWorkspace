@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.website.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.websites.update", [$website->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="web_url">{{ trans('cruds.website.fields.web_url') }}</label>
                <input class="form-control {{ $errors->has('web_url') ? 'is-invalid' : '' }}" type="text" name="web_url" id="web_url" value="{{ old('web_url', $website->web_url) }}" required>
                @if($errors->has('web_url'))
                    <span class="text-danger">{{ $errors->first('web_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.web_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="office_id">{{ trans('cruds.website.fields.office') }}</label>
                <select class="form-control select2 {{ $errors->has('office') ? 'is-invalid' : '' }}" name="office_id" id="office_id" required>
                    @foreach($offices as $id => $entry)
                        <option value="{{ $id }}" {{ (old('office_id') ? old('office_id') : $website->office->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('office'))
                    <span class="text-danger">{{ $errors->first('office') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.office_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.website.fields.status') }}</label>
                <textarea class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">{{ old('status', $website->status) }}</textarea>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_uploaded">{{ trans('cruds.website.fields.date_uploaded') }}</label>
                <input class="form-control date {{ $errors->has('date_uploaded') ? 'is-invalid' : '' }}" type="text" name="date_uploaded" id="date_uploaded" value="{{ old('date_uploaded', $website->date_uploaded) }}">
                @if($errors->has('date_uploaded'))
                    <span class="text-danger">{{ $errors->first('date_uploaded') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.date_uploaded_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hosting_server_id">{{ trans('cruds.website.fields.hosting_server') }}</label>
                <select class="form-control select2 {{ $errors->has('hosting_server') ? 'is-invalid' : '' }}" name="hosting_server_id" id="hosting_server_id" required>
                    @foreach($hosting_servers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('hosting_server_id') ? old('hosting_server_id') : $website->hosting_server->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hosting_server'))
                    <span class="text-danger">{{ $errors->first('hosting_server') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.hosting_server_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="config_file_location">{{ trans('cruds.website.fields.config_file_location') }}</label>
                <textarea class="form-control {{ $errors->has('config_file_location') ? 'is-invalid' : '' }}" name="config_file_location" id="config_file_location">{{ old('config_file_location', $website->config_file_location) }}</textarea>
                @if($errors->has('config_file_location'))
                    <span class="text-danger">{{ $errors->first('config_file_location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.config_file_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="database_server_id">{{ trans('cruds.website.fields.database_server') }}</label>
                <select class="form-control select2 {{ $errors->has('database_server') ? 'is-invalid' : '' }}" name="database_server_id" id="database_server_id" required>
                    @foreach($database_servers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('database_server_id') ? old('database_server_id') : $website->database_server->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('database_server'))
                    <span class="text-danger">{{ $errors->first('database_server') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.database_server_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="platform_id">{{ trans('cruds.website.fields.platform') }}</label>
                <select class="form-control select2 {{ $errors->has('platform') ? 'is-invalid' : '' }}" name="platform_id" id="platform_id">
                    @foreach($platforms as $id => $entry)
                        <option value="{{ $id }}" {{ (old('platform_id') ? old('platform_id') : $website->platform->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('platform'))
                    <span class="text-danger">{{ $errors->first('platform') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.platform_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="web_version">{{ trans('cruds.website.fields.web_version') }}</label>
                <input class="form-control {{ $errors->has('web_version') ? 'is-invalid' : '' }}" type="text" name="web_version" id="web_version" value="{{ old('web_version', $website->web_version) }}">
                @if($errors->has('web_version'))
                    <span class="text-danger">{{ $errors->first('web_version') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.web_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="admin_url">{{ trans('cruds.website.fields.admin_url') }}</label>
                <input class="form-control {{ $errors->has('admin_url') ? 'is-invalid' : '' }}" type="text" name="admin_url" id="admin_url" value="{{ old('admin_url', $website->admin_url) }}" required>
                @if($errors->has('admin_url'))
                    <span class="text-danger">{{ $errors->first('admin_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.admin_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="admin_password">{{ trans('cruds.website.fields.admin_password') }}</label>
                <input class="form-control {{ $errors->has('admin_password') ? 'is-invalid' : '' }}" type="password" name="admin_password" id="admin_password">
                @if($errors->has('admin_password'))
                    <span class="text-danger">{{ $errors->first('admin_password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.admin_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_template">{{ trans('cruds.website.fields.site_template') }}</label>
                <input class="form-control {{ $errors->has('site_template') ? 'is-invalid' : '' }}" type="text" name="site_template" id="site_template" value="{{ old('site_template', $website->site_template) }}">
                @if($errors->has('site_template'))
                    <span class="text-danger">{{ $errors->first('site_template') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.site_template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="favicon">{{ trans('cruds.website.fields.favicon') }}</label>
                <input class="form-control {{ $errors->has('favicon') ? 'is-invalid' : '' }}" type="text" name="favicon" id="favicon" value="{{ old('favicon', $website->favicon) }}">
                @if($errors->has('favicon'))
                    <span class="text-danger">{{ $errors->first('favicon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.favicon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.website.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', $website->remarks) }}">
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_last_check">{{ trans('cruds.website.fields.date_last_check') }}</label>
                <input class="form-control date {{ $errors->has('date_last_check') ? 'is-invalid' : '' }}" type="text" name="date_last_check" id="date_last_check" value="{{ old('date_last_check', $website->date_last_check) }}">
                @if($errors->has('date_last_check'))
                    <span class="text-danger">{{ $errors->first('date_last_check') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.date_last_check_helper') }}</span>
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