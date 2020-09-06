<?php


namespace App\Dto\Admin\Client;


class ListIndexDto
{
    protected $clientName;

    public function __construct(string $clientName = null)
    {
        $this->clientName = $clientName;
    }

    /**
     * @return string
     */
    public function getClientName(): ?string
    {
        return $this->clientName;
    }
}
