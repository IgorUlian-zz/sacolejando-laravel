<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Models\userRestaurant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class userRestaurantsController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    //metodo para pegar todos
    public function getAllRestaurants()
    {
        try {
            $userRestaurants = userRestaurant::all();
            if ($userRestaurants == null || empty($userRestaurants)) {
                throw new Exception('Restaurantes não encontrado', 404);
            }
            return response()->json([
                "status" => "ok",
                "message" =>"Todos os Restaurantes foram consultados.",
                "data" => $userRestaurants], 200);

        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSingleRestaurants($id)
    {
        try {
            $userRestaurants = userRestaurant::find($id);

            if ($userRestaurants == null) {

                throw new Exception('Restaurante não encontrado', 404);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Encontrado", "data" => $userRestaurants], 200);
        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertRestaurants(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "user_id" => "required", "numeric",
                "profile_id" => "required", "numeric",
                "restaurants_cnpj" => "required",
                "restaurant_name" => "required",
                "restaurant_contact" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

    
    $userRestaurants = new userRestaurant();
    
    $userRestaurants->user_id = $request->user_id;
    $userRestaurants->profile_id = $request->profile_id;
    $userRestaurants->restaurants_cnpj = $request->restaurants_cnpj;
    $userRestaurants->restaurant_name = $request->restaurant_name;
    $userRestaurants->restaurant_contact = $request->restaurant_contact; 

    $result = $userRestaurants->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar o Restaurante, tente novamente mais tarde...', 400);
    }

        $currentInsertData = userRestaurant::find($userRestaurants->id);
            return response()->json(["status" => "ok",
                "message" => "Restaurante adicionado com sucesso." . $request->restaurant_name . "",
                "data" => $currentInsertData], 200);

            } catch (Exception $e) {
            return response()->json(["status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }
   
}