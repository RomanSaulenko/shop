<?php


namespace App\Http\Controllers\Client;


use App\Exceptions\DataAlreadyExists;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\Store;
use App\Modules\ShoppingBasket\Facades\Cart;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    protected $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function createOrder(Request $request)
    {
        $basketProducts = Cart::content();
        $total = Cart::total();

        $authenticatedUser = $request->user();
        $authenticatedUser = optional($authenticatedUser);

        return view('client.order.create', compact('basketProducts', 'total', 'authenticatedUser'));
    }

    public function orderCreated()
    {
        $orderId = Session::get('order_created_id');

        if (!$orderId) {
            return redirect(route('index'));
        }
        $order = $this->service->getOrder($orderId);

        $total = $order->totalPrice();

        Cart::destroy();

        return view('client.order.created', compact('total'));
    }

    /**
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        try {
            $order = $this->service->store($data);

        } catch (DataAlreadyExists $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['user.email' => $exception->getMessage()]);
        }
        Session::flash('order_created_id', $order->id);

        return redirect(route('order.created'));
    }
}
