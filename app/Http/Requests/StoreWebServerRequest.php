<?php

namespace App\Http\Requests;

use App\Models\WebServer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWebServerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('web_server_create');
    }

    public function rules()
    {
        return [
            'server_name' => [
                'string',
                'required',
                'unique:web_servers',
            ],
            'ip_address' => [
                'string',
                'required',
                'unique:web_servers',
            ],
            'operating_system' => [
                'string',
                'nullable',
            ],
        ];
    }
}
