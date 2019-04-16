<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		DB::table('sex')->insert([
            'name' => 'Male'
        ]);
		
		DB::table('sex')->insert([
            'name' => 'Female'
        ]);
		
    }
}
