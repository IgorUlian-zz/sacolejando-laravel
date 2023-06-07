<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'plan_name'=> 'Plano Free',
            'url' => 'free',
            'plan_price' => 0.0,
            'plan_desc' => 'Plano sem assinatura para teste de 5 dias.',
        ]);

        Plan::create([
            'plan_name'=> 'Plano Standard',
            'url' => 'standard',
            'plan_price' => 69.90,
            'plan_desc' => 'Plano com assinatura mensal para usuários básicos do sistema.',
        ]);

        Plan::create([
            'plan_name'=> 'Plano Premium',
            'url' => 'premium',
            'plan_price' => 129.90,
            'plan_desc' => 'Plano com assinatura mensal para usuários com necessidades mais elaboradas do sistema.',
        ]);
    }
}
