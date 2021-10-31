<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderTypeRequest;
use App\Http\Requests\UpdateProviderTypeRequest;
use App\Http\Resources\Admin\ProviderTypeResource;
use App\Models\ProviderType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProviderTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('provider_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProviderTypeResource(ProviderType::all());
    }

    public function store(StoreProviderTypeRequest $request)
    {
        $providerType = ProviderType::create($request->all());

        return (new ProviderTypeResource($providerType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProviderType $providerType)
    {
        abort_if(Gate::denies('provider_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProviderTypeResource($providerType);
    }

    public function update(UpdateProviderTypeRequest $request, ProviderType $providerType)
    {
        $providerType->update($request->all());

        return (new ProviderTypeResource($providerType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProviderType $providerType)
    {
        abort_if(Gate::denies('provider_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providerType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
