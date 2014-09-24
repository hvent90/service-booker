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

        $dt = Carbon::today()->subMonth(2);

        $startDay = Day::createDay($dt);

        for ($i = 0; $i < 700; $i++) {
		  $this->day->onNextEmptyDate();
		}

    }

}