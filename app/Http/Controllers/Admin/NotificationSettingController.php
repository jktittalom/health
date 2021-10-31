<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNotificationSettingRequest;
use App\Http\Requests\StoreNotificationSettingRequest;
use App\Http\Requests\UpdateNotificationSettingRequest;
use App\Models\NotificationSetting;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notification_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notificationSettings = NotificationSetting::with(['user'])->get();

        $users = User::get();

        return view('admin.notificationSettings.index', compact('notificationSettings', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('notification_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notificationSettings.create', compact('users'));
    }

    public function store(StoreNotificationSettingRequest $request)
    {
        $notificationSetting = NotificationSetting::create($request->all());

        return redirect()->route('admin.notification-settings.index');
    }

    public function edit(NotificationSetting $notificationSetting)
    {
        abort_if(Gate::denies('notification_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notificationSetting->load('user');

        return view('admin.notificationSettings.edit', compact('users', 'notificationSetting'));
    }

    public function update(UpdateNotificationSettingRequest $request, NotificationSetting $notificationSetting)
    {
        $notificationSetting->update($request->all());

        return redirect()->route('admin.notification-settings.index');
    }

    public function show(NotificationSetting $notificationSetting)
    {
        abort_if(Gate::denies('notification_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notificationSetting->load('user');

        return view('admin.notificationSettings.show', compact('notificationSetting'));
    }

    public function destroy(NotificationSetting $notificationSetting)
    {
        abort_if(Gate::denies('notification_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notificationSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotificationSettingRequest $request)
    {
        NotificationSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
