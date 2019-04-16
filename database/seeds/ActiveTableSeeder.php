<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		DB::table('active')->insert([
            'name' => 'Active'
        ]);
		
		DB::table('active')->insert([
            'name' => 'Deactive'
        ]);
		
    }
}
