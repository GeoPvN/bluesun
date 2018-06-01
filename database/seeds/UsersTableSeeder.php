<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('users')->insert([
            'name' => 'Admin',
            'lname' => 'Dato',
            'fname' => 'Papalashvili',
            'date' => '1993-02-23',
            'sex_id' => '1',
            'member_id' => '1',
            'email' => 'admin@admin.ge',
            'password' => bcrypt('123321'),
        ]);

    }
}
