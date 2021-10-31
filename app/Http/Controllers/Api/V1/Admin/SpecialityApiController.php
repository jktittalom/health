<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecialityRequest;
use App\Http\Requests\UpdateSpecialityRequest;
use App\Http\Resources\Admin\SpecialityResource;
use App\Models\Speciality;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpecialityApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('speciality_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SpecialityResource(Speciality::all());
    }

    public function store(StoreSpecialityRequest $request)
    {
        $speciality = Speciality::create($request->all());

        return (new SpecialityResource($speciality))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Speciality $speciality)
    {
        abort_if(Gate::denies('speciality_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SpecialityResource($speciality);
    }

    public function update(UpdateSpecialityRequest $request, Speciality $speciality)
    {
        $speciality->update($request->all());

        return (new SpecialityResource($speciality))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Speciality $speciality)
    {
        abort_if(Gate::denies('speciality_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $speciality->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
