@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.office.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offices.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="office_name">{{ trans('cruds.office.fields.office_name') }}</label>
                <input class="form-control {{ $errors->has('office_name') ? 'is-invalid' : '' }}" type="text" name="office_name" id="office_name" value="{{ old('office_name', '') }}" required>
                @if($errors->has('office_name'))
                    <span class="text-danger">{{ $errors->first('office_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.office.fields.office_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_desc">{{ trans('cruds.office.fields.office_desc') }}</label>
                <input class="form-control {{ $errors->has('office_desc') ? 'is-invalid' : '' }}" type="text" name="office_desc" id="office_desc" value="{{ old('office_desc', '') }}">
                @if($errors->has('office_desc'))
                    <span class="text-danger">{{ $errors->first('office_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.office.fields.office_desc_helper') }}</span>
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