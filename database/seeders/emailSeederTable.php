<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class emailSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert([
            'email' => 'carevalo@gmlsoftware.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
