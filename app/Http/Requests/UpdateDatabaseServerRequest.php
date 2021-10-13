<?php

namespace App\Http\Requests;

use App\Models\DatabaseServer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDatabaseServerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('database_server_edit');
    }

    public function rules()
    {
        return [
            'server_name' => [
                'string',
                'required',
                'unique:database_servers,server_name,' . request()->route('database_server')->id,
            ],
            'server_ip' => [
                'string',
                'required',
                'unique:database_servers,server_ip,' . request()->route('database_server')->id,
            ],
        ];
    }
}
