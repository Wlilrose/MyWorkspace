<?php

namespace App\Http\Requests;

use App\Models\DatabaseServer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDatabaseServerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('database_server_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:database_servers,id',
        ];
    }
}
