<?php

namespace App\Http\Requests;

use App\Models\DatabaseServer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDatabaseServerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('database_server_create');
    }

    public function rules()
    {
        return [
            'server_name' => [
                'string',
                'required',
                'unique:database_servers',
            ],
            'server_ip' => [
                'string',
                'required',
                'unique:database_servers',
            ],
        ];
    }
}
