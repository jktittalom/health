<?php

namespace App\Http\Requests;

use App\Models\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'job_title' => [
                'string',
                'required',
            ],
            'job_description' => [
                'string',
                'nullable',
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'job_type' => [
                'required',
            ],
            'is_hourly' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'hour_rate' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'contact_person_name' => [
                'string',
                'required',
            ],
            'contact_person_mobile' => [
                'string',
                'nullable',
            ],
            'contact_person_email' => [
                'string',
                'nullable',
            ],
            'desigantion' => [
                'string',
                'nullable',
            ],
            'attach_1' => [
                'string',
                'nullable',
            ],
            'attach_2' => [
                'string',
                'nullable',
            ],
            'budget' => [
                'string',
                'nullable',
            ],
            'skills.*' => [
                'integer',
            ],
            'skills' => [
                'required',
                'array',
            ],
            'profile_id' => [
                'required',
                'integer',
            ],
            'facilities.*' => [
                'integer',
            ],
            'facilities' => [
                'required',
                'array',
            ],
            'min_salary' => [
                'string',
                'required',
            ],
            'max_salart' => [
                'string',
                'required',
            ],
            'over_time' => [
                'string',
                'nullable',
            ],
            'publish' => [
                'required',
            ],
            'travel_expense' => [
                'required',
            ],
            'experiences.*' => [
                'integer',
            ],
            'experiences' => [
                'required',
                'array',
            ],
        ];
    }
}
