<?php

namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'permission_name'=> 'orders',
            'permission_desc' => 'Permissão de acesso a pedidos',
        ]);
        Permission::create([
            'permission_name'=> 'plans',
            'permission_desc' => 'Permissão de acesso a planos',
        ]);
        Permission::create([
            'permission_name'=> 'tenants',
            'permission_desc' => 'Permissão de acesso a Empresas',
        ]);
        Permission::create([
            'permission_name'=> 'roles',
            'permission_desc' => 'Permissão de acesso a Regras',
        ]);
        Permission::create([
            'permission_name'=> 'users',
            'permission_desc' => 'Permissão de acesso a Usuários',
        ]);
        Permission::create([
            'permission_name'=> 'foods',
            'permission_desc' => 'Permissão de acesso a alimentos',
        ]);
        Permission::create([
            'permission_name'=> 'category',
            'permission_desc' => 'Permissão de acesso a categorias',
        ]);
        Permission::create([
            'permission_name'=> 'permission',
            'permission_desc' => 'Permissão de acesso a permissões',
        ]);
        Permission::create([
            'permission_name'=> 'profiles',
            'permission_desc' => 'Permissão de acesso a perfis',
        ]);
    }
}
