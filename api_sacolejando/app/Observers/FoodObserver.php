<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Food;

class FoodObserver
{
    /**
     * Handle the Plan "creating" event.
     *
     * @param  \App\Models\Food  $food
     * @return void
     */
    public function creating(Food $food)
    {
        $food->url = Str::kebab($food->food_name);

    }

    /**
     * Handle the Food "updated" event.
     *
     * @param  \App\Models\Food  $food
     * @return void
     */
    public function updating(Food $food)
    {
        $food->url = Str::kebab($food->food_name);
    }

}