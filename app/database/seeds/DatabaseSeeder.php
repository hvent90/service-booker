<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('expertisegroups')->delete();

		$this->call('AdvisorTableSeeder');
		$this->call('ServiceTableSeeder');
		$this->call('ExpertiseTableSeeder');
		$this->call('ExpertiseGroupTableSeeder');
		$this->call('LocationTableSeeder');
		$this->call('DayTableSeeder');
	}

}
