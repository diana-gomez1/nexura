<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nombre' => 'Profesional de proyectos'],
            ['nombre' => 'Desarrollador'],
            ['nombre' => 'Gerente estratégico'],
            ['nombre' => 'Auxiliar administrativo'],
        ]);
    }
}