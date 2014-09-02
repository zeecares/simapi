<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Eloquent::unguard();
		
		//echo $user= User::all();

		// $this->call('UserTableSeeder');
		//echo $result=Result::all();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		echo $result=Instance::all();
	}

}
