<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Exception;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllProfiles()
    {
        try {
            $profiles = Profile::all();
            if ($profiles == null || empty($profiles)) {
                throw new Exception('Perfil não encontrado', 404);
            }
            return response()->json([
                "status" => "ok",
                "message" => "Todos os Perfis foram consultados.",
                "data" => $profiles], 200);

        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSingleProfiles($id)
    {
        try {
            $profiles = Profile::find($id);

            if ($profiles == null) {

                throw new Exception('Perfil não encontrado', 404);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Encontrada",
                "data" => $profiles], 200);

        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertProfiles(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "profile_name" => "required",
                "profile_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $profiles = new Profile();
          
    $profiles->profile_name = $request->profile_name;
    $profiles->profile_desc = $request->profile_desc;


    $result = $profiles->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar o Perfil, tente novamente mais tarde...', 400);
    }

        $currentInsertData = Profile::find($profiles->id);
            return response()->json([
                "status" => "ok",
                "message" => "Perfil adicionado com sucesso." . $request->profile_name . "",
                "data" => $currentInsertData], 200);

            } catch (Exception $e) {
            return response()->json(["status" => "error",
            "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function updateProfiles(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "profile_name" => "required",
                "profile_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $profiles = Profile::find($id);

            if ($profiles == null) {

                throw new Exception('Perfil não encontrado', 404);
            }

            $profiles->profile_name = $request->profile_name;
            $profiles->profile_desc = $request->profile_desc;

            $result = $profiles->save();

            if (!$result) {

                throw new Exception('
                Atualizações da Categoria' . $profiles->profile_name . 'Falhou ao atualizar', 400);
            }

            return response()->json([
                "status" => "ok",
                "message" => "category  " . $profiles->profile_name . "Atualizado com sucesso",
                "data" => $profiles], 200);

        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deleteProfiles($id)
    {
        try {
            $profiles = Profile::find($id);

            if ($profiles == null) {

                throw new Exception('Perfil não encontrado', 404);
            }

            $result = $profiles->delete();

            if (!$result) {

                throw new Exception('O Perfil não pode ser excluído', 400);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Perfil excluído com sucesso"], 200);
        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

}
