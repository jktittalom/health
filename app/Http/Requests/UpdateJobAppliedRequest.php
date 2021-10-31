<?php

namespace App\Http\Requests;

use App\Models\JobApplied;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJobAppliedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_applied_edit');
    }

    public function rules()
    {
        return [
            'contract_id' => [
                'required',
                'integer',
            ],
            'provider_id' => [
                'required',
                'integer',
            ],
            'applied_date_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'contract_end_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'is_cancelled' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cancelled_date_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
