<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriaSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Cliente',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Proveedor',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Funcionario Interno',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
