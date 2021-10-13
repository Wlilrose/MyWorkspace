<?php

namespace App\Http\Requests;

use App\Models\TechnologyUsed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTechnologyUsedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('technology_used_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
