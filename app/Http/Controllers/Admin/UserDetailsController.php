<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserDetailRequest;
use App\Http\Requests\StoreUserDetailRequest;
use App\Http\Requests\UpdateUserDetailRequest;
use App\Models\Experience;
use App\Models\Facility;
use App\Models\Profile;
use App\Models\Speciality;
use App\Models\UserDetail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UserDetailsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDetails = UserDetail::with(['facility', 'specialities', 'profile', 'experience', 'media'])->get();

        $facilities = Facility::get();

        $specialities = Speciality::get();

        $profiles = Profile::get();

        $experiences = Experience::get();

        return view('admin.userDetails.index', compact('userDetails', 'facilities', 'specialities', 'profiles', 'experiences'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = Facility::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialities = Speciality::pluck('name', 'id');

        $profiles = Profile::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $experiences = Experience::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userDetails.create', compact('facilities', 'specialities', 'profiles', 'experiences'));
    }

    public function store(StoreUserDetailRequest $request)
    {
        $userDetail = UserDetail::create($request->all());
        $userDetail->specialities()->sync($request->input('specialities', []));
        if ($request->input('resume', false)) {
            $userDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('resume'))))->toMediaCollection('resume');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $userDetail->id]);
        }

        return redirect()->route('admin.user-details.index');
    }

    public function edit(UserDetail $userDetail)
    {
        abort_if(Gate::denies('user_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = Facility::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialities = Speciality::pluck('name', 'id');

        $profiles = Profile::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $experiences = Experience::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userDetail->load('facility', 'specialities', 'profile', 'experience');

        return view('admin.userDetails.edit', compact('facilities', 'specialities', 'profiles', 'experiences', 'userDetail'));
    }

    public function update(UpdateUserDetailRequest $request, UserDetail $userDetail)
    {
        $userDetail->update($request->all());
        $userDetail->specialities()->sync($request->input('specialities', []));
        if ($request->input('resume', false)) {
            if (!$userDetail->resume || $request->input('resume') !== $userDetail->resume->file_name) {
                if ($userDetail->resume) {
                    $userDetail->resume->delete();
                }
                $userDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('resume'))))->toMediaCollection('resume');
            }
        } elseif ($userDetail->resume) {
            $userDetail->resume->delete();
        }

        return redirect()->route('admin.user-details.index');
    }

    public function show(UserDetail $userDetail)
    {
        abort_if(Gate::denies('user_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDetail->load('facility', 'specialities', 'profile', 'experience');

        return view('admin.userDetails.show', compact('userDetail'));
    }

    public function destroy(UserDetail $userDetail)
    {
        abort_if(Gate::denies('user_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserDetailRequest $request)
    {
        UserDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_detail_create') && Gate::denies('user_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new UserDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
