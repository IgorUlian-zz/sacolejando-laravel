<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $reusableController;

    public function __construct(ReusableController $reusableController)
    {
        $this->reusableController = $reusableController;
    }

    public function getAllCategory()
    {
        try {
            $category = Category::all();
            if ($category == null || empty($category)) {
                throw new Exception('Categoria não encontrada', 404);
            }
            return response()->json([
                "status" => "ok",
                "message" => "Todos as Categoria foram consultados.",
                "data" => $category], 200);

        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function getSingleCategory($id)
    {
        try {
            $category = Category::find($id);

            if ($category == null) {

                throw new Exception('Categoria não encontrada', 404);
            }

            return response()->json([
                "status" => "ok", "message" => "Encontrada", "data" => $category], 200);
        } catch (Exception $e) {

            return response()->json([
                "status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function insertCategory(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "category_name" => "required",
                "category_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $category = new Category();

    $category->category_name = $request->category_name;
    $category->category_desc = $request->category_desc;


    $result = $category->save();

    if (!$result) {

        throw new Exception('Não foi possível adicionar a categoria, tente novamente mais tarde...', 400);
    }

        $currentInsertData = Category::find($category->id);
            return response()->json(["status" => "ok", "message" => "Categoria adicionada com sucesso." . $request->category_name . "", "data" => $currentInsertData], 200);
            } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function updateCategory(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "category_name" => "required",
                "category_desc" => "required",
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors()->first(), 400);
            }

            $category = Category::find($id);

            if ($category == null) {

                throw new Exception('Categoria não encontrado', 404);
            }

            $category->category_name = $request->category_name;
            $category->category_desc = $request->category_desc;

            $result = $category->save();

            if (!$result) {

                throw new Exception('
                Atualizações da Categoria' . $category->category_name . 'Falhou ao atualizar', 400);
            }

            return response()->json([
                "status" => "ok",
                "message" => "category  " . $category->category_name . "Atualizado com sucesso",
                "data" => $category], 200);

        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::find($id);

            if ($category == null) {

                throw new Exception('Categoria não encontrada', 404);
            }

            $result = $category->delete();

            if (!$result) {

                throw new Exception('O Categoria não pode ser excluída', 400);
            }

            return response()->json([
                "status" => "ok",
                "message" => "Categoria excluída com sucesso"], 200);
        } catch (Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()], $e->getCode());
        }
    }
}