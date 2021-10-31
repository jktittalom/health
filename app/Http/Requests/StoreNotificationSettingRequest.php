<?php

namespace App\Http\Requests;

use App\Models\NotificationSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNotificationSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notification_setting_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'weekdays' => [
                'string',
                'nullable',
            ],
            'all_days' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'timezone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
