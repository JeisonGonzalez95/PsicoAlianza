<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsAreasRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar roles
        $roles = ['Gerente', 'Jefe', 'Colaborador'];

        $roleIds = [];
        foreach ($roles as $role) {
            $roleIds[$role] = DB::table('employee_roles')->insertGetId([
                'name_role' => $role,
            ]);
        }

        // Insertar áreas
        $areas = [
            'Gerencia',
            'Marketing y estrategias',
            'Logistica',
            'Desarrollo',
            'Ventas'
        ];

        $areaIds = [];
        foreach ($areas as $area) {
            $areaIds[$area] = DB::table('employee_areas')->insertGetId([
                'name_area' => $area,
            ]);
        }

        // Insertar posiciones con relación al área y rol
        $positions = [
            'Gerencia' => [
                ['name_position' => 'Gerente General', 'role' => 'Gerente'],
            ],
            'Marketing y estrategias' => [
                ['name_position' => 'Analista de Marketing', 'role' => 'Colaborador'],
                ['name_position' => 'Especialista en Redes Sociales', 'role' => 'Colaborador'],
                ['name_position' => 'Director Creativo', 'role' => 'Jefe'],
                ['name_position' => 'Community Manager', 'role' => 'Colaborador'],
                ['name_position' => 'Diseñador Sr', 'role' => 'Colaborador'],
                ['name_position' => 'Diseñador Jr', 'role' => 'Colaborador'],
            ],
            'Logistica' => [
                ['name_position' => 'Coordinador de Logística', 'role' => 'Jefe'],
                ['name_position' => 'Analista de Inventarios', 'role' => 'Colaborador'],
                ['name_position' => 'Supervisor de Distribución', 'role' => 'Colaborador'],
            ],
            'Desarrollo' => [
                ['name_position' => 'Desarrollador Jr', 'role' => 'Colaborador'],
                ['name_position' => 'Desarrollador Sr', 'role' => 'Colaborador'],
                ['name_position' => 'Arquitecto de Software', 'role' => 'Jefe'],
                ['name_position' => 'WebMaster', 'role' => 'Colaborador'],
            ],
            'Ventas' => [
                ['name_position' => 'Ejecutivo de Ventas', 'role' => 'Colaborador'],
                ['name_position' => 'Asesor Comercial', 'role' => 'Colaborador'],
                ['name_position' => 'Gerente de Cuentas', 'role' => 'Jefe'],
            ],
        ];

        foreach ($positions as $area => $positionsArray) {
            foreach ($positionsArray as $position) {
                DB::table('employee_positions')->insert([
                    'name_position' => $position['name_position'],
                    'employee_area_id' => $areaIds[$area],
                    'employee_rol_id' => $roleIds[$position['role']],
                ]);
            }
        }
    }
}
