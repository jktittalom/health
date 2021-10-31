<?php

namespace App\Http\Requests;

use App\Models\ProviderType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProviderTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('provider_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:provider_types,name,' . request()->route('provider_type')->id,
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
