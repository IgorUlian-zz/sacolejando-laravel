<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllState()
    {
        try {
            $states = State::all();
            if ($states == null || empty($states)) {
                throw new Exception('Estado não encontrado.', 404);
            }
            return response()->json(["status" => "ok",
            "message" => "Estados os Estadoes foram consultados.",
            "data" => $states], 200);

        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSingleState($id)
    {
        try {
            $states = State::find($id);

            if ($states == null) {

                throw new Exception('Estado não encontrado', 404);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Encontrado",
                "data" => $states], 200);
        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertState(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "country_id" => "required",
                "state_name" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $states = new State();

            $states->country_id = $request->country_id;
            $states->state_name = $request->state_name;

            $result = $states->save();

            if (!$result) {

                throw new Exception('Não foi possível adicionar o Estado, tente novamente mais tarde...', 400);
            }

                $currentInsertData = State::find($states->id);
                    return response()->json([
                        "status" => "ok",
                        "message" => "Estado adicionado com sucesso." . $request->states_name . "",
                        "data" => $currentInsertData], 200);

                    } catch (Exception $e) {
                    return response()->json([
                        "status" => "error",
                        "message" => $e->getMessage()], $e->getCode());
                }
            }

    public function updateState(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "country_id" => "required",
                "states_name" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $states = State::find($id);

            if ($states == null) {

                throw new Exception('Estado não encontrado', 404);
            }

            $states->country_id = $request->country_id;
            $states->states_name = $request->states_name;

            $result = $states->save();

            if (!$result) {

                throw new Exception('
                Atualizações dos Estadoes' . $states->states_name . 'Falhou ao atualizar', 400);
            }

            return response()->json(["status" => "ok", "message" => "states  " . $states->states_name . "Atualizado com sucesso", "data" => $states], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deleteState($id)
    {
        try {
            $states = State::find($id);

            if ($states == null) {

                throw new Exception('Estado não encontrado', 404);
            }

            $result = $states->delete();

            if (!$result) {

                throw new Exception('O Estado não pode ser excluído', 400);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Estado excluído com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }
}