<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyWebServerRequest;
use App\Http\Requests\StoreWebServerRequest;
use App\Http\Requests\UpdateWebServerRequest;
use App\Models\WebServer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class WebServerController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('web_server_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = WebServer::query()->select(sprintf('%s.*', (new WebServer())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'web_server_show';
                $editGate = 'web_server_edit';
                $deleteGate = 'web_server_delete';
                $crudRoutePart = 'web-servers';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('server_name', function ($row) {
                return $row->server_name ? $row->server_name : '';
            });
            $table->editColumn('ip_address', function ($row) {
                return $row->ip_address ? $row->ip_address : '';
            });
            $table->editColumn('operating_system', function ($row) {
                return $row->operating_system ? $row->operating_system : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.webServers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('web_server_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.webServers.create');
    }

    public function store(StoreWebServerRequest $request)
    {
        $webServer = WebServer::create($request->all());

        return redirect()->route('admin.web-servers.index');
    }

    public function edit(WebServer $webServer)
    {
        abort_if(Gate::denies('web_server_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.webServers.edit', compact('webServer'));
    }

    public function update(UpdateWebServerRequest $request, WebServer $webServer)
    {
        $webServer->update($request->all());

        return redirect()->route('admin.web-servers.index');
    }

    public function show(WebServer $webServer)
    {
        abort_if(Gate::denies('web_server_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $webServer->load('hostingServerWebsites');

        return view('admin.webServers.show', compact('webServer'));
    }

    public function destroy(WebServer $webServer)
    {
        abort_if(Gate::denies('web_server_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $webServer->delete();

        return back();
    }

    public function massDestroy(MassDestroyWebServerRequest $request)
    {
        WebServer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
