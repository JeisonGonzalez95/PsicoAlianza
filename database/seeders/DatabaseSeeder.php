<?php

namespace Database\Seeders;

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
        $this->call(PositionsAreasRolesSeeder::class);
        $this->call(UserLoginAdmin::class);
        $this->call(StatesCitiesSeeder::class);
    }
}
