<?php


namespace Tests\Unit\Repositories;


use App\Models\Order\Client;
use App\Models\User;
use App\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ClientRepositoryTest extends TestCase
{
    /**
     * @covers \App\Repositories\ClientRepository::create
     */
    public function test_create()
    {
        $repository = $this->getRepository();
        $client = factory(Client::class)->create();

        $createdClient = $repository->create($client->toArray());

        $this->assertEquals($client->id, $createdClient->id);
    }

    public function test_all()
    {
        $repository = $this->getRepository();

        $clients = $repository->all();

        $this->assertInstanceOf(Collection::class, $clients);
    }

    public function test_addClientGroupToUser()
    {
        $user = factory(User::class)->create();

        $repository = $this->getRepository();
        $result = $repository->addClientGroupToUser($user);

        $this->assertEquals($result, true);
    }

    /**
     * @return ClientRepository|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function getRepository()
    {
        return $this->app->make(ClientRepository::class);
    }
}
