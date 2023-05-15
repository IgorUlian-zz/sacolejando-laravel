<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthClientController extends Controller
{
    public function authClient(Request $request)
    {
        //VALIDAR DADOS DO CLIENTE
        $request->validate([
                'client_email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required',
            ]);

        //BUSCAR CLIENTE EMAIL
            $client = Client::where('client_email', $request->client_email)->first();

            if (!$client || !Hash::check($request->password, $client->password)) {
                return response()->json(['message' => trans('messages.invalid_credentials')], 404);
            }

        // CRIAR TOKEN PARA DISPOSITIVO
            $token = $client->createToken($request->device_name)->plainTextToken;
    
            return response()->json(['token' => $token]);
        }

        //RETORNAR CLIENTE COM TOKEN REGISTRADO.
        public function recoverMe(Request $request)
        {
            $client = $request->user();

            return new ClientResource($client);
        }

        //EXECUTAR LOGOUT DO CLIENTE
        public function logoutClient(Request $request)
        {
           $client = $request->user();

        //REMOVER TOKEN DO CLIENTE
           $client->tokens()->delete();

           return response()->json([], 204);
        }
}
