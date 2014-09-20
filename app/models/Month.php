<?php namespace MyApp;

use Carbon\Carbon;
use \MyApp\Day;

class Month extends \Eloquent {

	/**
	 * Returns a descriptive array in regards to the Month's position in the Year.
	 * @param  Day    $day [description]
	 * @return [type]      [description]
	 */
	public function humanMonthOfYear(Day $day)
	{
		$dt = Carbon::parse($day->date);

		switch ($dt->month):
			case 0:
				return ['full' => 'January',     'abv' => 'Jan',   'num' => 0];
			case 1:
				return ['full' => 'February',    'abv' => 'Feb',   'num' => 1];
			case 2:
				return ['full' => 'March',       'abv' => 'Mar',   'num' => 2];
			case 3:
				return ['full' => 'April',       'abv' => 'Apr',   'num' => 3];
			case 4:
				return ['full' => 'May',         'abv' => 'May',   'num' => 4];
			case 5:
				return ['full' => 'June',        'abv' => 'Jun',   'num' => 5];
			case 6:
				return ['full' => 'July',        'abv' => 'Jul',   'num' => 6];
			case 7:
				return ['full' => 'August',      'abv' => 'Aug',   'num' => 7];
			case 8:
				return ['full' => 'September',   'abv' => 'Sep',   'num' => 8];
			case 9:
				return ['full' => 'October',     'abv' => 'Oct',   'num' => 9];
			case 10:
				return ['full' => 'November',    'abv' => 'Nov',   'num' => 10];
			case 11:
				return ['full' => 'December',    'abv' => 'Dec',   'num' => 11];
		endswitch;
	}


	/**
	 * Returns the amount of days in Day's Month.
	 * @param  Day    $day [description]
	 * @return [type]      [description]
	 */
	public function daysInThisMonth(Day $day)
	{
		$dt = Carbon::parse($day->date);


		return $dt->daysInMonth;
	}

	/**
	 * Returns the Week of the Day's Month that the Day resides in.
	 * @param  Day    $day [description]
	 * @return [type]      [description]
	 */
	public function weekOfTheMonth(Day $day)
	{
		$dt = Carbon::parse($day->date);

		return $dt->weekOfMonth;
	}

	public function groupByWeek(Day $day)
	{
		$day->getAllDaysInMonth();
		$day->segmentDaysInToWeeks();
	}

	public function getAllDaysInMonth(Day $day);
	{
		$allDays = Day::all()->lists('id', 'date');;
		dd($allDays);

	}

}