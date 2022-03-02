<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usuarioSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombres' => 'Gladis',
            'Apellidos' => 'Fernandez',
            'cedula' => 1231419292,
            'email'=> 'gfernandez@example.com',
            'pais'=> 'Colombia',
            'direccion'=> 'Cr 12 46-46 apt301',
            'celular'=> 3177864344,
            'Categoria_id'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
