<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan1= Plan::find(1);

        $plan2 = Plan::find(2);

        $plan3 = Plan::find(3);

        $plan1->tenants()->create([   
            'tenant_cnpj' => '75617635000131',
            'tenant_name' => 'Sacolejando Birigui',
            'url' => 'sacolejando',
            'tenant_email' => 'i97ulian@gmail.com',
            'contact' => '18998146078',
        ]);

        $plan1->tenants()->create([   
            'tenant_cnpj' => '75617635000132',
            'tenant_name' => 'Tempeiro Mineiro',
            'url' => 'tempeiro-mineiro',
            'tenant_email' => 'teste1@gmail.com',
            'contact' => '18998146078',
        ]);

        $plan2->tenants()->create([   
            'tenant_cnpj' => '75617635000133',
            'tenant_name' => 'Esquina do Boi',
            'url' => 'esquina-boi',
            'tenant_email' => 'teste2@gmail.com',
            'contact' => '18998146078',
        ]);

        $plan2->tenants()->create([   
            'tenant_cnpj' => '75617635000134',
            'tenant_name' => 'Barriga Cheia',
            'url' => 'barriga-cheia',
            'tenant_email' => 'teste3@gmail.com',
            'contact' => '18998146078',
        ]);

        $plan3->tenants()->create([   
            'tenant_cnpj' => '75617635000135',
            'tenant_name' => 'Intelbraza Pizzas',
            'url' => 'intelbras-pizza',
            'tenant_email' => 'teste4@gmail.com',
            'contact' => '18998146078',
        ]);

        $plan3->tenants()->create([   
            'tenant_cnpj' => '75617635000136',
            'tenant_name' => 'Ichiraku Oriental',
            'url' => 'Ichiraku-Oriental',
            'tenant_email' => 'teste5@gmail.com',
            'contact' => '18998146078',
        ]);
    }
}
