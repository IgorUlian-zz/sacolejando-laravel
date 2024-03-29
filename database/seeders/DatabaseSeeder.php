<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            ProfileTableSeeder::class,
            RoleTableSeeder::class,
            PlansTableSeeder::class,
            TenantsTableSeeder::class,
            UserTableSeeder::class,
            ClientTableSeeder::class,
            CategoryTableSeeder::class,
            FoodTableSeeder::class,

        ]);
    }
}
