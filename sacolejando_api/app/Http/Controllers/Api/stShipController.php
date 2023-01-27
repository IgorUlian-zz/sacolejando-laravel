<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\stShip;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class stShipController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllstShip()
    {
        try {
            $stship = stShip::all();
            if ($stship == null || empty($stship)) {
                throw new Exception('Status não encontrado', 404);
            }
            return response()->json(["status" => "ok", "message" => "Todos os Status foram consultados.", "data" => $stship], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSinglestShip($id)
    {
        try {
            $stship = stShip::find($id);

            if ($stship == null) {

                throw new Exception('Status não encontrado', 404);
            }

            return response()->json(["status" => "ok", "message" => "Encontrado", "data" => $stship], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertstShip(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_ship_name" => "required",
                "st_ship_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stship = new stShip();

    $stship->st_ship_name = $request->st_ship_name;
    $stship->st_ship_desc = $request->st_ship_desc;


    $result = $stship->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar a Status, tente novamente mais tarde...', 400);
    }

        $currentInsertData = stShip::find($stship->id);
            return response()->json(["status" => "ok", "message" => "Status adicionada com sucesso." . $request->stdelivery_name . "", "data" => $currentInsertData], 200);
            } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function updatestShip(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_ship_name" => "required",
                "st_ship_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stship = stShip::find($id);

            if ($stship == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $stship->st_ship_name = $request->st_ship_name;
            $stship->st_ship_desc = $request->st_ship_desc;

            $result = $stship->save();

            if (!$result) {

                throw new Exception('
                Atualizações dos Status' . $stship->st_ship_name . 'Falhou ao atualizar', 400);
            }

            return response()->json(["status" => "ok", "message" => "stdelivery  " . $stship->st_ship_name . "Atualizado com sucesso", "data" => $stship], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deletestShip($id)
    {
        try {
            $stship = stShip::find($id);

            if ($stship == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $result = $stship->delete();

            if (!$result) {

                throw new Exception('O Status não pode ser excluído', 400);
            }

            return response()->json(["status" => "ok", "message" => "Status excluído com sucesso"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
}