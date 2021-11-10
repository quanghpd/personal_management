<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AssetsType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetsTypeRequest;
use App\Http\Requests\UpdateAssetsTypeRequest;
use App\Http\Resources\Admin\AssetsTypeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetsTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssetsTypeResource(AssetsType::all());

    }

    public function store(StoreAssetsTypeRequest $request)
    {
        $asset_type = AssetsType::create($request->all());

        return (new AssetsTypeResource($asset_type))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(AssetsType $asset_type)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssetsTypeResource($asset_type);

    }

    public function update(UpdateAssetsTypeRequest $request, AssetsType $asset_type)
    {
        $asset_type->update($request->all());

        return (new AssetsTypeResource($asset_type))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(AssetsType $asset_type)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_type->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
