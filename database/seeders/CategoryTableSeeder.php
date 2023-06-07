<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\Category;
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

        $tenant1 = Tenant::find(1);

        $tenant2 = Tenant::find(2);


        $tenant1->categories()->create([   
            'category_name' => 'Caldos',
            'category_desc' => 'Ingredientes culinários preparados cozendo carnes ou vegetais.',
        ]);

        $tenant1->categories()->create([   
            'category_name' => 'Lanches',
            'category_desc' => 'Junção de pão, salada, carne e outros elementos, fazendo uma grande refeição.',
        ]);

        $tenant1->categories()->create([   
            'category_name' => 'Açaís',
            'category_desc' => 'Refrescante e energético e pode ser servido com uma série de acompanhamentos.',
        ]);
        $tenant1->categories()->create([   
            'category_name' => 'Pizzas',
            'category_desc' => 'Uma preparação culinária que consiste em um disco de massa fermentada de farinha de trigo.',
        ]);

        $tenant1->categories()->create([   
            'category_name' => 'Pães',
            'category_desc' => 'Alimento obtido pela cocção de uma massa, elaborada com farinha de cereal, água, sal/açúcar',
        ]);

        $tenant1->categories()->create([   
            'category_name' => 'Saladas',
            'category_desc' => 'Mistura de legumes, vegetais e até mesmo Frutas.',
        ]);

        $tenant1->categories()->create([   
            'category_name' => 'Oriental',
            'category_desc' => 'Uma verdadeira explosão de cores e sabores transborda pelas panelas que preparam as delícias orientais.',
        ]);
        
        $tenant1->categories()->create([   
            'category_name' => 'Sorvetes',
            'category_desc' => 'Sorvete ou gelado é uma sobremesa gelada à base de lacticínios como leite ou nata, com adição de outros ingredientes.',
        ]);
        
        $tenant2->categories()->create([   
            'category_name' => 'Caldos',
            'category_desc' => 'Ingredientes culinários preparados cozendo carnes ou vegetais.',
        ]);
        
        $tenant2->categories()->create([   
            'category_name' => 'Lanches',
            'category_desc' => 'Junção de pão, salada, carne e outros elementos, fazendo uma grande refeição.',
        ]);
        
        $tenant2->categories()->create([   
            'category_name' => 'Açaís',
            'category_desc' => 'Refrescante e energético e pode ser servido com uma série de acompanhamentos.',
        ]);
        $tenant2->categories()->create([   
            'category_name' => 'Pizzas',
            'category_desc' => 'Uma preparação culinária que consiste em um disco de massa fermentada de farinha de trigo.',
        ]);
        
        $tenant2->categories()->create([   
            'category_name' => 'Pães',
            'category_desc' => 'Alimento obtido pela cocção de uma massa, elaborada com farinha de cereal, água, sal/açúcar',
        ]);
        
        $tenant2->categories()->create([   
            'category_name' => 'Saladas',
            'category_desc' => 'Mistura de legumes, vegetais e até mesmo Frutas.',
        ]);
        
        $tenant2->categories()->create([   
            'category_name' => 'Oriental',
            'category_desc' => 'Uma verdadeira explosão de cores e sabores transborda pelas panelas que preparam as delícias orientais.',
        ]);
        
        $tenant2->categories()->create([   
            'category_name' => 'Sorvetes',
            'category_desc' => 'Sorvete ou gelado é uma sobremesa gelada à base de lacticínios como leite ou nata, com adição de outros ingredientes.',
        ]);

    }
}