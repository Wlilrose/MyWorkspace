<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDatabaseServerRequest;
use App\Http\Requests\StoreDatabaseServerRequest;
use App\Http\Requests\UpdateDatabaseServerRequest;
use App\Models\DatabaseServer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DatabaseServerController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('database_server_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $databaseServers = DatabaseServer::all();

        return view('admin.databaseServers.index', compact('databaseServers'));
    }

    public function create()
    {
        abort_if(Gate::denies('database_server_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.databaseServers.create');
    }

    public function store(StoreDatabaseServerRequest $request)
    {
        $databaseServer = DatabaseServer::create($request->all());

        return redirect()->route('admin.database-servers.index');
    }

    public function edit(DatabaseServer $databaseServer)
    {
        abort_if(Gate::denies('database_server_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.databaseServers.edit', compact('databaseServer'));
    }

    public function update(UpdateDatabaseServerRequest $request, DatabaseServer $databaseServer)
    {
        $databaseServer->update($request->all());

        return redirect()->route('admin.database-servers.index');
    }

    public function show(DatabaseServer $databaseServer)
    {
        abort_if(Gate::denies('database_server_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $databaseServer->load('databaseServerWebsites');

        return view('admin.databaseServers.show', compact('databaseServer'));
    }

    public function destroy(DatabaseServer $databaseServer)
    {
        abort_if(Gate::denies('database_server_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $databaseServer->delete();

        return back();
    }

    public function massDestroy(MassDestroyDatabaseServerRequest $request)
    {
        DatabaseServer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
