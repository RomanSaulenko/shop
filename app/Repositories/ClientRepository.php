<?php


namespace App\Repositories;


use App\Models\Order\Client;

class ClientRepository
{
    /**
     * @var Client
     */
    protected $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    public function getClients()
    {
        return $this->model;
    }
}
