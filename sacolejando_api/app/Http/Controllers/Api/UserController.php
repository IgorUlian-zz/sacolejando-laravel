<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

    class UserController extends Controller
{

    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllUser(){
        $users = User::all();

        return response()->json([
            "status" => "ok",
            "message" => "Usuário encontrado.",
            "data" => $users,
        ],
        200);
    }

    public function getSingleUser($id){
        $user = User::find($id);

        if(!empty($user)){
            return response()->json([
                "status" => "ok",
                "message" => "Usuário encontrado.",
                "data" => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'Não foi possível encontrar o usuário'.$id.'',
                'data' => null,
            ], 404);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::find($id);

            if ($user == null) {

                throw new Exception('Usuário não encontrado', 404);
            }
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "user_email" => "required|email",
                "user_password  " => "required|min:5|max:8",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $user = User::where('user_email', $request->user_email)->first();
            if ($user == null) {

                throw new Exception("Email do Usuário " . $request->user_email . " Não encontrado", 404);
            }


            if (!Hash::check($request->user_password, $user->user_password)) {

                throw new Exception("Senha Inválida", 400);
            }
            return response()->json(["status" => "ok", "message" => "Login efetuado com sucesso", "data" => $user], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function registerUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "user_name" => "required",
                "user_email" => "required|email|unique:users,user_email",
                "user_password" => "required|min:5|max:8",
                "password_confirmation" => "required|same:user_password"
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $user = new User();

            $user->user_name = $request->user_name;
            $user->user_email  = $request->user_email;
            $user->user_password = Hash::make($request->user_password);

            $result = $user->save();

            if (!$result) {

                throw new Exception("Falha ao registrar, tente novamente mais tarde...", 400);
            }

            $this->reusableController->sendEmail($request->user_name, $request->user_email);

            return response()->json(["status" => "ok", "message" => "Registro efetuado com sucesso,",], 200);
        } catch (Exception $e) {

            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }
}
