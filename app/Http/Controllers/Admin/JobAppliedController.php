<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJobAppliedRequest;
use App\Http\Requests\StoreJobAppliedRequest;
use App\Http\Requests\UpdateJobAppliedRequest;
use App\Models\Job;
use App\Models\JobApplied;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobAppliedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_applied_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplieds = JobApplied::with(['contract', 'provider'])->get();

        $jobs = Job::get();

        $users = User::get();

        return view('admin.jobApplieds.index', compact('jobApplieds', 'jobs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_applied_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contracts = Job::pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $providers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jobApplieds.create', compact('contracts', 'providers'));
    }

    public function store(StoreJobAppliedRequest $request)
    {
        $jobApplied = JobApplied::create($request->all());

        return redirect()->route('admin.job-applieds.index');
    }

    public function edit(JobApplied $jobApplied)
    {
        abort_if(Gate::denies('job_applied_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contracts = Job::pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $providers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jobApplied->load('contract', 'provider');

        return view('admin.jobApplieds.edit', compact('contracts', 'providers', 'jobApplied'));
    }

    public function update(UpdateJobAppliedRequest $request, JobApplied $jobApplied)
    {
        $jobApplied->update($request->all());

        return redirect()->route('admin.job-applieds.index');
    }

    public function show(JobApplied $jobApplied)
    {
        abort_if(Gate::denies('job_applied_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplied->load('contract', 'provider');

        return view('admin.jobApplieds.show', compact('jobApplied'));
    }

    public function destroy(JobApplied $jobApplied)
    {
        abort_if(Gate::denies('job_applied_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplied->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobAppliedRequest $request)
    {
        JobApplied::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
