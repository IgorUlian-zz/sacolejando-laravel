<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  CARGOS DE NEGÓCIOS      
        Role::create([
            'role_name'=> 'Administrador',
            'role_desc' => 'Cargo com acesso de administradores.',
            'url' => 'admin',
        ]);
        Role::create([
            'role_name'=> 'Cozinheiro',
            'role_desc' => 'Cargo com acesso de cozinheiros.',
            'url' => 'cozinheiro',
        ]);
        Role::create([
            'role_name'=> 'Delivery',
            'role_desc' => 'Cargo com acesso de entregadores.',
            'url' => 'delivery',
        ]);
        Role::create([
            'role_name'=> 'Supervisor',
            'role_desc' => 'Cargo com acesso de supervisor.',
            'url' => 'supervisor',
        ]);

    }
}
