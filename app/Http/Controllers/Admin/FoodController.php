<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateFood;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    private $repository;

    public function __construct(Food $food)
    {
        $this->repository = $food;

        
        $this->middleware('can:foods');
    }
    
    /**
     * METODO DE VISUALIZAÇÃO
     */
    public function index()
    {
        $foods = $this->repository->latest()->paginate();

        return view('admin.pages.foods.index', compact('foods'));
    }

    /**
     * METODO PARA CADASTRAR UM NOVO
     */
    public function create()
    {
        return view('admin.pages.foods.create');
    }

    public function store(StoreUpdateFood $request)
    {
        $data = $request->all();

        $tenant = auth()->user()->tenant;

        if ($request->hasFile('image') && $request->image->isValid()) {
            $data['image'] = $request->image->store("tenants/foods");
        }

        $this->repository->create($data);

        return redirect()->route('foods.index');
    }

    /**
     * OBTER RESULTADOS
     */
    public function details($id)
    {

        if(!$food = $this->repository->find($id))
        {
            return redirect()->back();

        }

        return view('admin.pages.foods.details', compact('food'));
    }

    /**
     * FUNÇÃO PARA APAGAR
     */

    public function delete($id)
    {
        if(!$food = $this->repository->find($id)){
            return redirect()->back();
        }

        if (Storage::exists($food->image)) {
            Storage::delete($food->image);
        }

        $food->delete();

        return redirect()->route('foods.index');
    }

    /**
     * ATUALIZAR RESULTADOS
     */

    public function edit($id)
    {

        if(!$food = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.foods.edit', compact('food'));
    }

    /**
     * ATUALIZAR RESULTADOS
     */

    public function update(StoreUpdateFood $request, $id)
    {
        if(!$food = $this->repository->find($id)){
            return redirect()->back();

        }

        $data = $request->all();

        $tenant = auth()->user()->tenant;

        if ($request->hasFile('image') && $request->image->isValid()) {

            if (Storage::exists($food->image)) {
                Storage::delete($food->image);
            }

            $data['image'] = $request->image->store("tenants/foods");
        }

        $food->update($data);

        return redirect()->route('foods.index');
    }

    /**
     * PESQUISAR RESULTADOS
     */

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $foods = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('food_name', $request->filter);
                                $query->orWhere('food_desc', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->latest()
                        ->paginate();

                        return view('admin.pages.foods.index', compact('foods', 'filters'));          

    }

}
