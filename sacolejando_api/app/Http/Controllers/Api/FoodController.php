<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    protected $reusableController;
    var $table = 'foods';

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;


    }

    public function getAllFood()
    {
        try {
            $foods = Food::all();
            if ($foods == null || empty($foods)) {
                throw new Exception('Comidas não encontradas', 404);
            }
            return response()->json([
                "status" => "ok",
                "message" =>"Todas as Comidas foram consultadas.",
                "data" => $foods], 200);

        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSingleFood($id)
    {
        try {
            $foods = Food::find($id);

            if ($foods == null) {

                throw new Exception('Comida não encontrada', 404);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Encontrado", "data" => $foods], 200);
        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertFood(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "category_id" => "required", 
                "restaurant_id" => "required",
                "food_name" => "required",
                "food_price" => "required",
                "food_ingredients" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

    
    $foods = new Food();
    
    $foods->category_id = $request->category_id;
    $foods->restaurant_id = $request->restaurant_id;
    $foods->food_name = $request->food_name;
    $foods->food_price = $request->food_price;
    $foods->food_ingredients = $request->food_ingredients; 

    $result = $foods->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar a Comida, tente novamente mais tarde...', 400);
    }

        $currentInsertData = Food::find($foods->id);
            return response()->json([
                "status" => "ok", 
                "message" => "Comida adicionada com sucesso. " . $request->food_name . "", 
                "data" => $currentInsertData], 200);
            } catch (Exception $e) {
            return response()->json([
                "status" => "error", 
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getRestaurantFood(int $restaurantId)
    {
        try {
            $foods = DB::table($this->table)
			-> join('user_restaurants', 'foods.restaurant_id', '=', 'user_restaurants.id')
            -> where('foods.restaurant_id', $restaurantId)
            ->select('foods.*')
            ->get();

            if ($foods == null) {

                throw new Exception('Comida não encontrada', 404);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Encontrado", "data" => $foods], 200);
        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }

}
}