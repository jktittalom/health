<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificationSettingRequest;
use App\Http\Requests\UpdateNotificationSettingRequest;
use App\Http\Resources\Admin\NotificationSettingResource;
use App\Models\NotificationSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationSettingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notification_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotificationSettingResource(NotificationSetting::with(['user'])->get());
    }

    public function store(StoreNotificationSettingRequest $request)
    {
        $notificationSetting = NotificationSetting::create($request->all());

        return (new NotificationSettingResource($notificationSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NotificationSetting $notificationSetting)
    {
        abort_if(Gate::denies('notification_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotificationSettingResource($notificationSetting->load(['user']));
    }

    public function update(UpdateNotificationSettingRequest $request, NotificationSetting $notificationSetting)
    {
        $notificationSetting->update($request->all());

        return (new NotificationSettingResource($notificationSetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NotificationSetting $notificationSetting)
    {
        abort_if(Gate::denies('notification_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notificationSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
