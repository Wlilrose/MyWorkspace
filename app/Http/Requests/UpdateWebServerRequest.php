<?php

namespace App\Http\Requests;

use App\Models\WebServer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWebServerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('web_server_edit');
    }

    public function rules()
    {
        return [
            'server_name' => [
                'string',
                'required',
                'unique:web_servers,server_name,' . request()->route('web_server')->id,
            ],
            'ip_address' => [
                'string',
                'required',
                'unique:web_servers,ip_address,' . request()->route('web_server')->id,
            ],
            'operating_system' => [
                'string',
                'nullable',
            ],
        ];
    }
}
