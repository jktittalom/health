<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJobRequest;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Experience;
use App\Models\Facility;
use App\Models\Job;
use App\Models\Profile;
use App\Models\Speciality;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JobsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::with(['user', 'skills', 'profile', 'facilities', 'experiences'])->get();

        $users = User::get();

        $specialities = Speciality::get();

        $profiles = Profile::get();

        $facilities = Facility::get();

        $experiences = Experience::get();

        return view('admin.jobs.index', compact('jobs', 'users', 'specialities', 'profiles', 'facilities', 'experiences'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills = Speciality::pluck('name', 'id');

        $profiles = Profile::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facilities = Facility::pluck('name', 'id');

        $experiences = Experience::pluck('name', 'id');

        return view('admin.jobs.create', compact('users', 'skills', 'profiles', 'facilities', 'experiences'));
    }

    public function store(StoreJobRequest $request)
    {
        $job = Job::create($request->all());
        $job->skills()->sync($request->input('skills', []));
        $job->facilities()->sync($request->input('facilities', []));
        $job->experiences()->sync($request->input('experiences', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $job->id]);
        }

        return redirect()->route('admin.jobs.index');
    }

    public function edit(Job $job)
    {
        abort_if(Gate::denies('job_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills = Speciality::pluck('name', 'id');

        $profiles = Profile::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facilities = Facility::pluck('name', 'id');

        $experiences = Experience::pluck('name', 'id');

        $job->load('user', 'skills', 'profile', 'facilities', 'experiences');

        return view('admin.jobs.edit', compact('users', 'skills', 'profiles', 'facilities', 'experiences', 'job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());
        $job->skills()->sync($request->input('skills', []));
        $job->facilities()->sync($request->input('facilities', []));
        $job->experiences()->sync($request->input('experiences', []));

        return redirect()->route('admin.jobs.index');
    }

    public function show(Job $job)
    {
        abort_if(Gate::denies('job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->load('user', 'skills', 'profile', 'facilities', 'experiences', 'contractTrackers', 'contractJobApplieds');

        return view('admin.jobs.show', compact('job'));
    }

    public function destroy(Job $job)
    {
        abort_if(Gate::denies('job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobRequest $request)
    {
        Job::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('job_create') && Gate::denies('job_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Job();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
