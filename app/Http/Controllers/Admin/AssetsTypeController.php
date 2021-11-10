<?php

namespace App\Http\Controllers\Admin;

use App\AssetsType;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetsTypeRequest;
use App\Http\Requests\StoreAssetsTypeRequest;
use App\Http\Requests\UpdateAssetsTypeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetsTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assets_type = AssetsType::all();

        return view('admin.assettype.index', compact('assets_type'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assettype.create');
    }

    public function store(StoreAssetsTypeRequest $request)
    {
        $asset_type = AssetsType::create($request->all());

        return redirect()->route('admin.assettype.index');
    }

    public function edit(AssetsType $assettype)
    {
        abort_if(Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assettype.edit', compact('assettype'));
    }

    public function update(UpdateAssetsTypeRequest $request,AssetsType $assettype)
    {
        $assettype->update($request->all());

        return redirect()->route('admin.assettype.index');
    }

    public function show(AssetsType $assettype)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assettype.show', compact('assettype'));
    }

    public function destroy(AssetsType $assettype)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assettype->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetsTypeRequest $request)
    {
        AssetsType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
