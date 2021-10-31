<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrackerRequest;
use App\Http\Requests\StoreTrackerRequest;
use App\Http\Requests\UpdateTrackerRequest;
use App\Models\Job;
use App\Models\Tracker;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tracker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackers = Tracker::with(['client', 'contract'])->get();

        $users = User::get();

        $jobs = Job::get();

        return view('admin.trackers.index', compact('trackers', 'users', 'jobs'));
    }

    public function create()
    {
        abort_if(Gate::denies('tracker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contracts = Job::pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trackers.create', compact('clients', 'contracts'));
    }

    public function store(StoreTrackerRequest $request)
    {
        $tracker = Tracker::create($request->all());

        return redirect()->route('admin.trackers.index');
    }

    public function edit(Tracker $tracker)
    {
        abort_if(Gate::denies('tracker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contracts = Job::pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tracker->load('client', 'contract');

        return view('admin.trackers.edit', compact('clients', 'contracts', 'tracker'));
    }

    public function update(UpdateTrackerRequest $request, Tracker $tracker)
    {
        $tracker->update($request->all());

        return redirect()->route('admin.trackers.index');
    }

    public function show(Tracker $tracker)
    {
        abort_if(Gate::denies('tracker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracker->load('client', 'contract');

        return view('admin.trackers.show', compact('tracker'));
    }

    public function destroy(Tracker $tracker)
    {
        abort_if(Gate::denies('tracker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracker->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrackerRequest $request)
    {
        Tracker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
