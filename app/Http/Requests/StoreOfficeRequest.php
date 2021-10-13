<?php

namespace App\Http\Requests;

use App\Models\Office;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOfficeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('office_create');
    }

    public function rules()
    {
        return [
            'office_name' => [
                'string',
                'required',
                'unique:offices',
            ],
            'office_desc' => [
                'string',
                'nullable',
            ],
        ];
    }
}
