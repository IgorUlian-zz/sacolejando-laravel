<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\stDelivery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class stDeliveryController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllstDelivery()
    {
        try {
            $stdelivery = stDelivery::all();
            if ($stdelivery == null || empty($stdelivery)) {
                throw new Exception('Status não encontrado', 404);
            }
            return response()->json(["status" => "ok", "message" => "Todos os Status foram consultados.", "data" => $stdelivery], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSinglestDelivery($id)
    {
        try {
            $stdelivery = stDelivery::find($id);

            if ($stdelivery == null) {

                throw new Exception('Status não encontrado', 404);
            }

            return response()->json(["status" => "ok", "message" => "Encontrado", "data" => $stdelivery], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertstDelivery(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_delivery_name" => "required",
                "st_delivery_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stdelivery = new stDelivery();

    $stdelivery->st_delivery_name = $request->st_delivery_name;
    $stdelivery->st_delivery_desc = $request->st_delivery_desc;


    $result = $stdelivery->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar a Status, tente novamente mais tarde...', 400);
    }

        $currentInsertData = stDelivery::find($stdelivery->id);
            return response()->json(["status" => "ok", "message" => "Status adicionada com sucesso." . $request->stdelivery_name . "", "data" => $currentInsertData], 200);
            } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function updatestDelivery(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_delivery_name" => "required",
                "st_delivery_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stdelivery = stDelivery::find($id);

            if ($stdelivery == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $stdelivery->st_delivery_name = $request->st_delivery_name;
            $stdelivery->st_delivery_desc = $request->st_delivery_desc;

            $result = $stdelivery->save();

            if (!$result) {

                throw new Exception('
                Atualizações dos Status' . $stdelivery->st_delivery_name . 'Falhou ao atualizar', 400);
            }

            return response()->json(["status" => "ok", "message" => "stdelivery  " . $stdelivery->st_delivery_name . "Atualizado com sucesso", "data" => $stdelivery], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deletestDelivery($id)
    {
        try {
            $stdelivery = stDelivery::find($id);

            if ($stdelivery == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $result = $stdelivery->delete();

            if (!$result) {

                throw new Exception('O Status não pode ser excluído', 400);
            }

            return response()->json(["status" => "ok", "message" => "Status excluído com sucesso"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
}