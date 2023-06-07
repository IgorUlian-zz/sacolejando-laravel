<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\Food;
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

        $tenant1 = Tenant::find(1);

        $tenant2 = Tenant::find(2);


        $tenant1->foods()->create([
            'food_name'=> 'Caldo de Mandicoca',
            'url' => 'caldo-mandioca',
            'price'=> 10.50,
            'ingredients' => 'Mandioca amarela, caldo de costela, cebolinha, cebola, alho e bacon. ',
            'food_desc'=> 'Caldo de Madioca com Bacon, muito bom para imunidade.',


        ]);

        $tenant1->foods()->create([
            'food_name'=> 'X - Salada',
            'url' => 'x-salada',
            'price'=> 16.50,
            'ingredients' => 'Pão de batata, alface, tomate, queijo e humburger 120g',
            'food_desc'=> 'X-Salada com Humburguer Artesanal de 120g.',

        ]);

        $tenant1->foods()->create([
            'food_name'=> 'Açaí com Morango',
            'url' => 'acai-morango',
            'price'=> 14.50,
            'ingredients' => 'Massa de açaí, morango, leite em pó e leite condensado.',
            'food_desc'=> 'Combo número 3 do cardápio The Best.',

        ]);

        $tenant1->foods()->create([
            'food_name'=> 'Pizza de Mussarela',
            'url' => 'pizza-mussarela',
            'price'=> 48.50,
            'ingredients' => 'Mussarela, tomate, molho de tomate, orégano e Azeitona',
            'food_desc'=> 'Massa italiana com bastante mussarela.',

        ]);

        $tenant1->foods()->create([
            'food_name'=> 'Pão Caseiro',
            'url' => 'pao-caseiro',
            'price'=> 12.0,
            'ingredients' => 'Farinha de trigo, fermento, água, açucar/sal.',
            'food_desc'=> 'Pão caseiro da receita de familia, bem mácio.',

        ]);

        $tenant1->foods()->create([
            'food_name'=> 'Salada de Tomate com Cebola Roxa',
            'url' => 'salada-cebola-roxa',
            'price'=> 9.90,
            'ingredients' => 'Alface, tomate seco e cebola roxa.',
            'food_desc'=> 'Mistura de tomate seco e cebola roxa com tempeiro especial.',

        ]);

        $tenant1->foods()->create([
            'food_name'=> 'Sushi 6 Unidades',
            'url' => 'sushi_mura',
            'price'=> 24.90,
            'ingredients' => 'Arroz japones, salmão, algas marinhas, pepino e shoyo',
            'food_desc'=> 'Sushi de salmão com pepino, 6 unidades.',

        ]);

        $tenant1->foods()->create([
            'food_name'=> 'Sorvete de Ninho com Creme de Avelã',
            'url' => 'sorve-ninho-avela',
            'price'=> 24.90,
            'ingredients' => 'Massa de sorvete de Leite Ninho misturado com Creme de Avelã (Nutella).',
            'food_desc'=> 'Pote de um 1LT de Sorvete de Ninho com Creme de Avelã ',

        ]);
        $tenant2->foods()->create([
            'food_name'=> 'Caldo de Mandicoca',
            'url' => 'caldo-de-mandioca',
            'price'=> 10.50,
            'ingredients' => 'Mandioca amarela, caldo de costela, cebolinha, cebola, alho e bacon. ',
            'food_desc'=> 'Caldo de Madioca com Bacon, muito bom para imunidade.',


        ]);

        $tenant2->foods()->create([
            'food_name'=> 'X - Salada',
            'url' => 'x-saladinha',
            'price'=> 16.50,
            'ingredients' => 'Pão de batata, alface, tomate, queijo e humburger 120g',
            'food_desc'=> 'X-Salada com Humburguer Artesanal de 120g.',

        ]);

        $tenant2->foods()->create([
            'food_name'=> 'Açaí com Morango',
            'url' => 'acai-morango2',
            'price'=> 14.50,
            'ingredients' => 'Massa de açaí, morango, leite em pó e leite condensado.',
            'food_desc'=> 'Combo número 3 do cardápio The Best.',

        ]);

        $tenant2->foods()->create([
            'food_name'=> 'Pizza de Mussarela',
            'url' => 'pizza-missarela-2',
            'price'=> 48.50,
            'ingredients' => 'Mussarela, tomate, molho de tomate, orégano e Azeitona',
            'food_desc'=> 'Massa italiana com bastante mussarela.',

        ]);

        $tenant2->foods()->create([
            'food_name'=> 'Pão Caseiro',
            'url' => 'pao-caseiro2',
            'price'=> 12.0,
            'ingredients' => 'Farinha de trigo, fermento, água, açucar/sal.',
            'food_desc'=> 'Pão caseiro da receita de familia, bem mácio.',

        ]);

        $tenant2->foods()->create([
            'food_name'=> 'Salada de Tomate com Cebola Roxa',
            'url' => 'salada-tomate-cebola-roxa',
            'price'=> 9.90,
            'ingredients' => 'Alface, tomate seco e cebola roxa.',
            'food_desc'=> 'Mistura de tomate seco e cebola roxa com tempeiro especial.',

        ]);

        $tenant2->foods()->create([
            'food_name'=> 'Sushi 6 Unidades',
            'url' => 'sushi-6uni',
            'price'=> 24.90,
            'ingredients' => 'Arroz japones, salmão, algas marinhas, pepino e shoyo',
            'food_desc'=> 'Sushi de salmão com pepino, 6 unidades.',

        ]);

        $tenant2->foods()->create([
            'food_name'=> 'Sorvete de Ninho com Creme de Avelã',
            'url' => 'sorvete-ninho-nutella',
            'price'=> 24.90,
            'ingredients' => 'Massa de sorvete de Leite Ninho misturado com Creme de Avelã (Nutella).',
            'food_desc'=> 'Pote de um 1LT de Sorvete de Ninho com Creme de Avelã ',

        ]);
        
    }
}
