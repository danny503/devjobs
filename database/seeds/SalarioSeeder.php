<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salarios')->insert([
            'name' => '0 - 1000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([
            'name' => '1000 - 2000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([
            'name' => '2000 - 3000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([
            'name' => 'No mostrar',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
