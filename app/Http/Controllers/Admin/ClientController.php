<?php


namespace App\Http\Controllers\Admin;


use App\Exceptions\DataAlreadyExists;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\Store;
use App\Models\Order\Client;
use App\Services\ClientService;

use Exception;

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
        $client = $this->service->getClient($id);

        return view('admin.client.edit', compact('client'));
    }

    public function store(Store $request)
    {
        try {
            $this->service->createOrUpdateClient($request->validated()['client']);
        } catch (DataAlreadyExists $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['client.email' => $exception->getMessage()]);
        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => __('error.Error_occured')]);
        }

        return redirect(route('admin.client.index'));
    }

    public function delete(string $id)
    {
        $this->service->delete($id);

        return response(null, 204);
    }
}
