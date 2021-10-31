<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubscriptionRequest;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptions = Subscription::with(['provider', 'package'])->get();

        $users = User::get();

        $packages = Package::get();

        return view('admin.subscriptions.index', compact('subscriptions', 'users', 'packages'));
    }

    public function create()
    {
        abort_if(Gate::denies('subscription_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packages = Package::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subscriptions.create', compact('providers', 'packages'));
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->all());

        return redirect()->route('admin.subscriptions.index');
    }

    public function edit(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packages = Package::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscription->load('provider', 'package');

        return view('admin.subscriptions.edit', compact('providers', 'packages', 'subscription'));
    }

    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->update($request->all());

        return redirect()->route('admin.subscriptions.index');
    }

    public function show(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->load('provider', 'package');

        return view('admin.subscriptions.show', compact('subscription'));
    }

    public function destroy(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->delete();

        return back();
    }

    public function massDestroy(MassDestroySubscriptionRequest $request)
    {
        Subscription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
