<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProviderTypeRequest;
use App\Http\Requests\StoreProviderTypeRequest;
use App\Http\Requests\UpdateProviderTypeRequest;
use App\Models\ProviderType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProviderTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('provider_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providerTypes = ProviderType::all();

        return view('admin.providerTypes.index', compact('providerTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('provider_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providerTypes.create');
    }

    public function store(StoreProviderTypeRequest $request)
    {
        $providerType = ProviderType::create($request->all());

        return redirect()->route('admin.provider-types.index');
    }

    public function edit(ProviderType $providerType)
    {
        abort_if(Gate::denies('provider_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providerTypes.edit', compact('providerType'));
    }

    public function update(UpdateProviderTypeRequest $request, ProviderType $providerType)
    {
        $providerType->update($request->all());

        return redirect()->route('admin.provider-types.index');
    }

    public function show(ProviderType $providerType)
    {
        abort_if(Gate::denies('provider_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providerTypes.show', compact('providerType'));
    }

    public function destroy(ProviderType $providerType)
    {
        abort_if(Gate::denies('provider_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providerType->delete();

        return back();
    }

    public function massDestroy(MassDestroyProviderTypeRequest $request)
    {
        ProviderType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
