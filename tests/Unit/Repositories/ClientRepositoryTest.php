<?php


namespace Tests\Unit\Repositories;


use App\Models\Order\Client;
use App\Repositories\ClientRepository;
use Tests\TestCase;

class ClientRepositoryTest extends TestCase
{
    protected static $repository;

    /**
     * @covers \App\Repositories\ClientRepository::getByEmail
     * @dataProvider getByEmailData
     */
    public function test_getByEmail_success($email, $clientId)
    {
        $repository = $this->getRepository();

        $result = $repository->getByEmail($email);
        $this->assertEquals(optional($result)->id, $clientId);
    }

    /**
     * @return ClientRepository
     */
    protected function getRepository()
    {
        if (!static::$repository) {
            static::$repository = app(ClientRepository::class);
        }
        return static::$repository;
    }

    public function getByEmailData()
    {
        $client = factory(Client::class)->create();

        return [
            [$client->email, $client->id],
            ['invalid_email', null]
        ];
    }
}
