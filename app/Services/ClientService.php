<?php

namespace App\Services;

use App\Repositories\ClientRepository;

class ClientService
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository,)
    {
        $this->clientRepository = $clientRepository;

    }

    public function createNewClient(array $data)
    {
        return $this->clientRepository->createNewClient($data);
    }
}