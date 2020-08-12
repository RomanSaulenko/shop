<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\ListClients;
use App\Services\ClientService;

class ClientController extends Controller
{
    /**
     * @var ClientService
     */
    protected $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    public function list(ListClients $request)
    {
        $data = $request->validated();
        $clients = $this->service->all($data);

        return view('admin.client.index', compact('clients'));
    }
}
