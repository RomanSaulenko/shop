<?php


namespace App\Events\Order;


class BeforeOrderStore
{
    /**
     * @var array
     */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }
}
