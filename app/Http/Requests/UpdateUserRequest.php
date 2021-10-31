<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'phone' => [
                'string',
                'min:10',
                'max:13',
                'required',
                'unique:users,phone,' . request()->route('user')->id,
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'device_type' => [
                'string',
                'nullable',
            ],
            'device_token' => [
                'string',
                'nullable',
            ],
            'status' => [
                'required',
            ],
            'user_type' => [
                'required',
            ],
            'facilties.*' => [
                'integer',
            ],
            'facilties' => [
                'required',
                'array',
            ],
        ];
    }
}
