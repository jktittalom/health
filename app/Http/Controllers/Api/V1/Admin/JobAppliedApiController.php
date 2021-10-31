<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobAppliedRequest;
use App\Http\Requests\UpdateJobAppliedRequest;
use App\Http\Resources\Admin\JobAppliedResource;
use App\Models\JobApplied;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobAppliedApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_applied_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobAppliedResource(JobApplied::with(['contract', 'provider'])->get());
    }

    public function store(StoreJobAppliedRequest $request)
    {
        $jobApplied = JobApplied::create($request->all());

        return (new JobAppliedResource($jobApplied))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JobApplied $jobApplied)
    {
        abort_if(Gate::denies('job_applied_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobAppliedResource($jobApplied->load(['contract', 'provider']));
    }

    public function update(UpdateJobAppliedRequest $request, JobApplied $jobApplied)
    {
        $jobApplied->update($request->all());

        return (new JobAppliedResource($jobApplied))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JobApplied $jobApplied)
    {
        abort_if(Gate::denies('job_applied_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplied->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
