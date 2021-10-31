<?php

namespace App\Http\Requests;

use App\Models\ProviderType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProviderTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('provider_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:provider_types',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
