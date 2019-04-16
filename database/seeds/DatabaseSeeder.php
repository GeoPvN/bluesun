<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call([
			SexTableSeeder::class,
			MemberTableSeeder::class,
			ActiveTableSeeder::class,
			UsersTableSeeder::class,
		]);
    }
}
