<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Http\Resources\Admin\ExperienceResource;
use App\Models\Experience;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExperienceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('experience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExperienceResource(Experience::all());
    }

    public function store(StoreExperienceRequest $request)
    {
        $experience = Experience::create($request->all());

        return (new ExperienceResource($experience))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Experience $experience)
    {
        abort_if(Gate::denies('experience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExperienceResource($experience);
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->all());

        return (new ExperienceResource($experience))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Experience $experience)
    {
        abort_if(Gate::denies('experience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experience->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
