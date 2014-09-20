<?php

use \MyApp\Day;
use Carbon\Carbon;

class DayTableSeeder extends Seeder {

	protected $day;

	public function __construct(Day $day)
	{
		$this->day = $day;
	}

    public function run()
    {
        DB::table('days')->delete();

        $this->day->createDay();

        for ($i = 0; $i < 700; $i++) {
		  $this->day->onNextEmptyDate($this->day->createDay());
		}

    }

}