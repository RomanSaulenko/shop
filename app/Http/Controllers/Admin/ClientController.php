<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\ListIndex;
use App\Services\ClientService;
use Illuminate\Config\Repository as Config;

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

    public function list(ListIndex $request, Config $config)
    {
        config();
        $clients = $this->service
            ->get($request->getDto())
            ->paginate($config->get('clients.admin_clients_per_page'));

        return view('admin.user.index', compact('clients'));
    }
}
