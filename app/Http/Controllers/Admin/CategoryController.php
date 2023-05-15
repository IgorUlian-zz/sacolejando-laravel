<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;

    public function __construct(Category $category)
    {
        $this->repository = $category;

        $this->middleware('can:categories');
    }
    
    /**
     * METODO DE VISUALIZAÇÃO
     */
    public function index()
    {
        $categories = $this->repository->latest()->paginate();

        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * METODO PARA CADASTRAR UM NOVO
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(StoreUpdateCategory $request)
    {

        $this->repository->create($request->all());


        return redirect()->route('categories.index');
    }

    /**
     * OBTER RESULTADOS
     */
    public function details($id)
    {

        if(!$category = $this->repository->find($id))
        {
            return redirect()->back();

        }

        return view('admin.pages.categories.details', compact('category'));
    }

    /**
     * FUNÇÃO PARA APAGAR
     */

    public function delete($id)
    {
        if(!$category = $this->repository->find($id)){
            return redirect()->back();
        }

        $category->delete();

        return redirect()->route('categories.index');
    }

    /**
     * ATUALIZAR RESULTADOS
     */

    public function edit($id)
    {

        if(!$category = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * ATUALIZAR RESULTADOS
     */

    public function update(StoreUpdateCategory $request, $id)
    {

        if(!$category = $this->repository->find($id)){
            return redirect()->back();

        }

        $category->update($request->all());

            return redirect()->route('categories.index');
    }

    /**
     * PESQUISAR RESULTADOS
     */

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $categories = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('category_name', $request->filter);
                                $query->orWhere('category_desc', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->latest()
                        ->paginate();

                        return view('admin.pages.categories.index', compact('categories', 'filters'));          

    }

}

