<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tenant = Tenant::first();

        $tenant->foods()->create([
            'food_name'=> 'Salada de Tomate com Ovo',
            'food_price'=> 10.0,
            'food_desc'=> 'Mistura de Tomate, Ovo, Alface e temperos variados',
        ]);
    }
}
