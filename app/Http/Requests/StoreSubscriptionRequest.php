<?php

namespace App\Http\Requests;

use App\Models\Subscription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubscriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subscription_create');
    }

    public function rules()
    {
        return [
            'provider_id' => [
                'required',
                'integer',
            ],
            'package_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'price' => [
                'string',
                'required',
            ],
            'is_trial' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'is_paid' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'is_trial_expired' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
