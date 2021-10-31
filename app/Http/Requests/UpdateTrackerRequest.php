<?php

namespace App\Http\Requests;

use App\Models\Tracker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrackerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tracker_edit');
    }

    public function rules()
    {
        return [
            'client_id' => [
                'required',
                'integer',
            ],
            'contract_id' => [
                'required',
                'integer',
            ],
            'view' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'click' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'applied' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
