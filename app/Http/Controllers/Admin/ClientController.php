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
        $clients = Client::paginate(1);

        return view('admin.client.index', compact('clients'));
    }

    public function edit(string $id)
    {
        return view();
    }
}
