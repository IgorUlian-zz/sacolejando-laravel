<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TenantRequestForm;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryAPIController extends Controller
{

    protected $categoryService;
    //
    public  function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    //RETORNAR CATEGORIAS BASEADAS NO RESTAURANTES
    public function categoriesByTenant(TenantRequestForm $request)
    {
        //if(!$request->token_company){
        // return response()->json(['message' => 'Token não encontrado'], 404);
        //}
        
        $categories = $this->categoryService->getCategoriesByUuid($request->token_company);

        return CategoryResource::collection($categories);
    }

        //RETORNAR CATEGORIAS BASEADAS NA URL
        public function showCategory(TenantRequestForm $request, $identify)
        {
            if(!$category = $this->categoryService->getCategoryByUuid($identify)){
                return response()->json(['message' => 'Categoria não encontrada'], 404);
            }
            
    
            return new CategoryResource($category);
        }
}
