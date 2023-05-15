<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class CategoryFoodController extends Controller
{
    protected $food, $category;

    public function __construct(Food $food, Category $category)
    {
        $this->food = $food;
        $this->category = $category;

    }

    public function categories($idFood)
    {   
        $food  = $this->food->find($idFood);

        if(!$food){
            return redirect()->back();
        }

        $categories = $food->categories()->paginate();

        return view('admin.pages.foods.categories.categories', compact('food', 'categories'));

   }

       public function foods($idCategory)
    {   
        if(!$category = $this->category->find($idCategory))
        {
            return redirect()->back();
        }

        $foods = $category->foods()->paginate();

        return view('admin.pages.categories.foods.foods', compact('category', 'foods'));

   }

   public function categoriesAvailable(Request $request, $idFood)
   {   

        if(!$food = $this->food->find($idFood))
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $categories = $food->categoriesAvailable($request->filter);

        return view('admin.pages.foods.categories.available', compact('food', 'categories', 'filters'));

   }

   public function attachCategoriesFood(Request $request, $idFood)
   {   

        if(!$food = $this->food->find($idFood))
        {
            return redirect()->back();
        }

        
        if (!$request->categories || count($request->categories) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $food->categories()->attach($request->categories);

        return redirect()->route('foods.categories', $food->id);
    }

    public function detachCategoriesFood($idFood, $idCategory)
    {      

        $food = $this->food->find($idFood);
        $category = $this->category->find($idCategory);

         if(!$food || !$category)
         {
             return redirect()->back();
         }
 
         $food->categories()->detach($category);
 
         return redirect()->route('foods.categories', $food->id);
     }

}