<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order\Client;
use App\Services\ClientService;

class ClientController extends Controller
{
    protected $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $this->service->getClients();
        $clients = Client::paginate(50);

        return view('admin.client.index', compact('clients'));
    }

    public function edit(string $id)
    {
        $client = $this->service->getClients()->first();

        return view('admin.client.edit', compact('client'));
    }
}
