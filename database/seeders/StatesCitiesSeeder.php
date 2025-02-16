<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            'Bogotá D.C.' => ['Bogotá'],
            'Antioquia' => ['Medellín', 'Bello', 'Envigado'],
            'Valle del Cauca' => ['Cali', 'Palmira', 'Buenaventura'],
            'Atlántico' => ['Barranquilla', 'Soledad', 'Malambo'],
            'Santander' => ['Bucaramanga', 'Floridablanca', 'Girón']
        ];

        foreach ($states as $stateName => $cities) {
            $stateId = DB::table('states')->insertGetId([
                'name_state' => $stateName,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            foreach ($cities as $cityName) {
                DB::table('cities')->insert([
                    'name_city' => $cityName,
                    'state_id' => $stateId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
