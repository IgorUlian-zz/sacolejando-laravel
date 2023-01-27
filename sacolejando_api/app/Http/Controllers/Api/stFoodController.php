<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\stFood;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class stFoodController extends Controller
{
  /*  protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllstFood()
    {
        try {
            $stfood = stFood::all();
            if ($stfood == null || empty($stfood)) {
                throw new Exception('Status não encontrado', 404);
            }
            return response()->json(["status" => "ok", "message" => "Todos os Status foram consultados.", "data" => $stfood], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSinglestFood($id)
    {
        try {
            $stfood = stFood::find($id);

            if ($stfood == null) {

                throw new Exception('Status não encontrado', 404);
            }

            return response()->json(["status" => "ok", "message" => "Encontrado", "data" => $stfood], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertstFood(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_food_name" => "required",
                "st_food_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stfood = new stFood();

    $stfood->st_food_name = $request->st_food_name;
    $stfood->st_food_desc = $request->st_food_desc;


    $result = $stfood->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar a Status, tente novamente mais tarde...', 400);
    }

        $currentInsertData = stFood::find($stfood->id);
        return response()->json(["status" => "ok", "message" => "Status adicionada com sucesso." . $request->st_food_name . "", "data" => $currentInsertData], 200);
    } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function updatestFood(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_food_name" => "required",
                "st_food_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stfood = stFood::find($id);

            if ($stfood == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $stfood->st_food_name = $request->st_food_name;
            $stfood->st_food_desc = $request->st_food_desc;

            $result = $stfood->save();

            if (!$result) {

                throw new Exception('
                Atualizações dos Status' . $stfood->st_food_name . 'Falhou ao atualizar', 400);
            }

            return response()->json(["status" => "ok", "message" => "stfood  " . $stfood->st_food_name . "Atualizado com sucesso", "data" => $stfood], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deletestFood($id)
    {
        try {
            $stfood = stFood::find($id);

            if ($stfood == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $result = $stfood->delete();

            if (!$result) {

                throw new Exception('O Status não pode ser excluído', 400);
            }

            return response()->json(["status" => "ok", "message" => "Status excluído com sucesso"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }*/
}