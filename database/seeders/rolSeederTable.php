<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'nombre' => 'Profesional de proyectos - Desarrollador',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Gerente estrategico',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Auxiliar administrativo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
