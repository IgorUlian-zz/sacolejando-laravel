<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateClient;
use App\Http\Resources\ClientResource;
use App\Services\ClientService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function storeClient(StoreUpdateClient $request)
    {
        $client = $this->clientService->createNewClient($request->all());

        return new ClientResource($client);
    }
}
 