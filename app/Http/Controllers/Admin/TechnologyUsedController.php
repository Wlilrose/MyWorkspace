<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTechnologyUsedRequest;
use App\Http\Requests\StoreTechnologyUsedRequest;
use App\Http\Requests\UpdateTechnologyUsedRequest;
use App\Models\TechnologyUsed;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TechnologyUsedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('technology_used_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $technologyUseds = TechnologyUsed::all();

        return view('admin.technologyUseds.index', compact('technologyUseds'));
    }

    public function create()
    {
        abort_if(Gate::denies('technology_used_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.technologyUseds.create');
    }

    public function store(StoreTechnologyUsedRequest $request)
    {
        $technologyUsed = TechnologyUsed::create($request->all());

        return redirect()->route('admin.technology-useds.index');
    }

    public function edit(TechnologyUsed $technologyUsed)
    {
        abort_if(Gate::denies('technology_used_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.technologyUseds.edit', compact('technologyUsed'));
    }

    public function update(UpdateTechnologyUsedRequest $request, TechnologyUsed $technologyUsed)
    {
        $technologyUsed->update($request->all());

        return redirect()->route('admin.technology-useds.index');
    }

    public function show(TechnologyUsed $technologyUsed)
    {
        abort_if(Gate::denies('technology_used_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.technologyUseds.show', compact('technologyUsed'));
    }

    public function destroy(TechnologyUsed $technologyUsed)
    {
        abort_if(Gate::denies('technology_used_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $technologyUsed->delete();

        return back();
    }

    public function massDestroy(MassDestroyTechnologyUsedRequest $request)
    {
        TechnologyUsed::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
