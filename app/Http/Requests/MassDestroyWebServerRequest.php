<?php

namespace App\Http\Requests;

use App\Models\WebServer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWebServerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('web_server_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:web_servers,id',
        ];
    }
}
