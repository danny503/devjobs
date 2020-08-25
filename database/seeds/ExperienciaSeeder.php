<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiencias')->insert([
            'name' => '0 - 6 Meses',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('experiencias')->insert([
            'name' => '6 Meses - 1 Año',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('experiencias')->insert([
            'name' => '1 Año - 3 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('experiencias')->insert([
            'name' => '3 Años - 5 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('experiencias')->insert([
            'name' => '5 Años - 8 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
