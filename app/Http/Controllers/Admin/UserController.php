<?php


namespace App\Http\Controllers\Admin;


use App\Exceptions\DataAlreadyExists;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\Store;
use App\Models\Order\Client;
use App\Services\UserService;

use Exception;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $this->service->getUsers();
        $clients = Client::paginate(50);

        return view('admin.user.index', compact('clients'));
    }

    public function edit(string $id)
    {
        $client = $this->service->getUser($id);

        return view('admin.user.edit', compact('client'));
    }

    public function store(Store $request)
    {
        try {
            $this->service->createOrUpdate($request->validated()['user']);
        } catch (DataAlreadyExists $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['user.email' => $exception->getMessage()]);
        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => __('error.Error_occured')]);
        }

        return redirect(route('admin.user.index'));
    }

    public function delete(string $id)
    {
        $this->service->delete($id);

        return response(null, 204);
    }
}
