<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\stOrdered;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class stOrderedController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllstOrdered()
    {
        try {
            $stordered = stOrdered::all();
            if ($stordered == null || empty($stordered)) {
                throw new Exception('Status não encontrado', 404);
            }
            return response()->json(["status" => "ok", "message" => "Todos os Status foram consultados.", "data" => $stordered], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSinglestOrdered($id)
    {
        try {
            $stordered = stOrdered::find($id);

            if ($stordered == null) {

                throw new Exception('Status não encontrado', 404);
            }

            return response()->json(["status" => "ok", "message" => "Encontrado", "data" => $stordered], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertstOrdered(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_ordered_name" => "required",
                "st_ordered_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stordered = new stOrdered();

    $stordered->st_ordered_name = $request->st_ordered_name;
    $stordered->st_ordered_desc = $request->st_ordered_desc;


    $result = $stordered->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar a Status, tente novamente mais tarde...', 400);
    }

        $currentInsertData = stOrdered::find($stordered->id);
            return response()->json(["status" => "ok", "message" => "Status adicionada com sucesso." . $request->st_ordered_name . "", "data" => $currentInsertData], 200);
            } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function updatestOrdered(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_ordered_name" => "required",
                "st_ordered_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stordered = stOrdered::find($id);

            if ($stordered == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $stordered->st_ordered_name = $request->st_ordered_name;
            $stordered->st_ordered_desc = $request->st_ordered_desc;

            $result = $stordered->save();

            if (!$result) {

                throw new Exception('
                Atualizações dos Status' . $stordered->st_ordered_name . 'Falhou ao atualizar', 400);
            }

            return response()->json(["status" => "ok", "message" => "stordered " . $stordered->st_ordered_name . "Atualizado com sucesso", "data" => $stordered], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deletestOrdered($id)
    {
        try {
            $stordered = stOrdered::find($id);

            if ($stordered == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $result = $stordered->delete();

            if (!$result) {

                throw new Exception('O Status não pode ser excluído', 400);
            }

            return response()->json(["status" => "ok", "message" => "Status excluído com sucesso"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
}