<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		DB::table('member')->insert([
            'name' => 'Admin'
        ]);
		
		DB::table('member')->insert([
            'name' => 'User'
        ]);
		
    }
}
