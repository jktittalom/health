<?php

namespace App\Http\Requests;

use App\Models\UserDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_detail_create');
    }

    public function rules()
    {
        return [
            'address' => [
                'string',
                'nullable',
            ],
            'npi_num' => [
                'string',
                'nullable',
            ],
            'specialities.*' => [
                'integer',
            ],
            'specialities' => [
                'array',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
            'lng' => [
                'string',
                'nullable',
            ],
        ];
    }
}
