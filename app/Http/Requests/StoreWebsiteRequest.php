<?php

namespace App\Http\Requests;

use App\Models\Website;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWebsiteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('website_create');
    }

    public function rules()
    {
        return [
            'web_url' => [
                'string',
                'required',
                'unique:websites',
            ],
            'office_id' => [
                'required',
                'integer',
            ],
            'date_uploaded' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'hosting_server_id' => [
                'required',
                'integer',
            ],
            'database_server_id' => [
                'required',
                'integer',
            ],
            'web_version' => [
                'string',
                'nullable',
            ],
            'admin_url' => [
                'string',
                'required',
                'unique:websites',
            ],
            'admin_password' => [
                'required',
            ],
            'site_template' => [
                'string',
                'nullable',
            ],
            'favicon' => [
                'string',
                'nullable',
            ],
            'remarks' => [
                'string',
                'nullable',
            ],
            'date_last_check' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
