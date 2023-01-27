<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\stPayment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class stPaymentController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllstPayment()
    {
        try {
            $stpayment = stPayment::all();
            if ($stpayment == null || empty($stpayment)) {
                throw new Exception('Status não encontrado', 404);
            }
            return response()->json(["status" => "ok", "message" => "Todos os Status foram consultados.", "data" => $stpayment], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSinglestPayment($id)
    {
        try {
            $stpayment = stPayment::find($id);

            if ($stpayment == null) {

                throw new Exception('Status não encontrado', 404);
            }

            return response()->json(["status" => "ok", "message" => "Encontrado", "data" => $stpayment], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertstPayment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_payment_name" => "required",
                "st_payment_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stpayment = new stPayment();

    $stpayment->st_payment_name = $request->st_payment_name;
    $stpayment->st_payment_desc = $request->st_payment_desc;


    $result = $stpayment->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar a Status, tente novamente mais tarde...', 400);
    }

        $currentInsertData = stPayment::find($stpayment->id);
            return response()->json(["status" => "ok", "message" => "Status adicionada com sucesso." . $request->stdelivery_name . "", "data" => $currentInsertData], 200);
            } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function updatestPayment(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "st_payment_name" => "required",
                "st_payment_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $stpayment = stPayment::find($id);

            if ($stpayment == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $stpayment->st_payment_name = $request->st_payment_name;
            $stpayment->st_payment_desc = $request->st_payment_desc;

            $result = $stpayment->save();

            if (!$result) {

                throw new Exception('
                Atualizações dos Status' . $stpayment->st_payment_name . 'Falhou ao atualizar', 400);
            }

            return response()->json(["status" => "ok", "message" => "stdelivery  " . $stpayment->st_payment_name . "Atualizado com sucesso", "data" => $stpayment], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deletestPayment($id)
    {
        try {
            $stpayment = stPayment::find($id);

            if ($stpayment == null) {

                throw new Exception('Status não encontrado', 404);
            }

            $result = $stpayment->delete();

            if (!$result) {

                throw new Exception('O Status não pode ser excluído', 400);
            }

            return response()->json(["status" => "ok", "message" => "Status excluído com sucesso"], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
}