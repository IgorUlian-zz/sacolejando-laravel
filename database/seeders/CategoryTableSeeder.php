<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tenant = Tenant::first();

        $tenant->categories()->create([   
            'category_name' => 'Salada',
            'category_desc' => 'Mistura de legumes, vegetais e até mesmo Frutas.',
        ]);

        $tenant->categories()->create([   
            'category_name' => 'Lanche',
            'category_desc' => 'Junção de pão, salada, carne e outros elementos, fazendo uma grande refeição.',
        ]);

        $tenant->categories()->create([   
            'category_name' => 'Açaí',
            'category_desc' => 'Refrescante e energético e pode ser servido com uma série de acompanhamentos.',
        ]);
        $tenant->categories()->create([   
            'category_name' => 'Pizza',
            'category_desc' => 'Uma preparação culinária que consiste em um disco de massa fermentada de farinha de trigo.',
        ]);
    }
}