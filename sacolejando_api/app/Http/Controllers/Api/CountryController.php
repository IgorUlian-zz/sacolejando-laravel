<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllCountry()
    {
        try {
            $country = Country::all();
            if ($country == null || empty($country)) {
                throw new Exception('Páis não encontrado.', 404);
            }
            return response()->json(["status" => "ok", "message" => "Todos os Países foram consultados.", "data" => $country], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSingleCountry($id)
    {
        try {
            $country = Country::find($id);

            if ($country == null) {

                throw new Exception('País não encontrado', 404);
            }

            return response()->json(["status" => "ok", "message" => "Encontrado", "data" => $country], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
    

    public function insertCountry(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "country_cipher" => "required",
                "country_name" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $country = new Country();

            $country->country_cipher = $request->country_cipher;
            $country->country_name = $request->country_name;

            $result = $country->save();

            if (!$result) {

                throw new Exception('Não foi possível adicionar o País, tente novamente mais tarde...', 400);
            }

                $currentInsertData = Country::find($country->id);
                    return response()->json(["status" => "ok", "message" => "País adicionado com sucesso." . $request->country_name . "", "data" => $currentInsertData], 200);
                    } catch (Exception $e) {
                    return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
                }
            }

    public function updateCountry(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "country_cipher" => "required",
                "country_name" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $country = Country::find($id);

            if ($country == null) {

                throw new Exception('País não encontrado', 404);
            }

            $country->country_cipher = $request->country_cipher;
            $country->country_name = $request->country_name;

            $result = $country->save();

            if (!$result) {

                throw new Exception('
                Atualizações dos Países' . $country->country_name . 'Falhou ao atualizar', 400);
            }

            return response()->json(["status" => "ok", "message" => "country  " . $country->country_name . "Atualizado com sucesso", "data" => $country], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deleteCountry($id)
    {
        try {
            $country = Country::find($id);

            if ($country == null) {

                throw new Exception('País não encontradp', 404);
            }

            $result = $country->delete();

            if (!$result) {

                throw new Exception('O País não pode ser excluído', 400);
            }

            return response()->json(["status" => "ok", "message" => "País excluído com sucesso"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
}