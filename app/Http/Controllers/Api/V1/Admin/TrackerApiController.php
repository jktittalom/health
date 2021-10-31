<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrackerRequest;
use App\Http\Requests\UpdateTrackerRequest;
use App\Http\Resources\Admin\TrackerResource;
use App\Models\Tracker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tracker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrackerResource(Tracker::with(['client', 'contract'])->get());
    }

    public function store(StoreTrackerRequest $request)
    {
        $tracker = Tracker::create($request->all());

        return (new TrackerResource($tracker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tracker $tracker)
    {
        abort_if(Gate::denies('tracker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrackerResource($tracker->load(['client', 'contract']));
    }

    public function update(UpdateTrackerRequest $request, Tracker $tracker)
    {
        $tracker->update($request->all());

        return (new TrackerResource($tracker))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tracker $tracker)
    {
        abort_if(Gate::denies('tracker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracker->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
