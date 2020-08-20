<?php


namespace App\Http\Controllers\Auth;


use App\Events\Client\ClientRegistered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;

class ClientRegisterController extends RegisterController
{
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function register(Request $request)
    {
        $user = parent::register($request);
        $this->dispatcher->dispatch(new ClientRegistered($user));

        return redirect(route('index'));
    }

    protected function registered(Request $request, $user)
    {
        return $user;
    }
}
