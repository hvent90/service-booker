<?php namespace App\Controllers\Admin;

use View;

use \MyApp\Availability;
use \MyApp\Advisor;
use \MyApp\Meeting;
use Carbon\Carbon;

class DayAPIController extends \BaseController {

	protected $day;

	public function __construct(Day $day)
	{
		$this->day = $day;
	}

	public function getAll()
	{
		$days = Day::all();

		return $days->toJson();
	}

	public function createDay()
	{
		$this->day->createDay();

		$days = Day::select()->orderBy('date', 'desc')->lists('date');

		return $days->toJson();
	}

	public function createNextEmptyDay()
	{
		$this->day->onNextEmptyDate($this->day->createDay());

		$days = Day::select()->orderBy('date', 'desc')->lists('date');

		return $this->day->getFarthestDay()->toJson();
	}

	public function getCalendarMonthViewOfYearAndMonth($yearInput, $monthInput)
	{
		$dt    = Carbon::parse($monthInput.'/01/'.$yearInput);
		$month = $dt->month;
		$year  = strval($dt->year);

		$oneMonthViewOfDaysWithTelomeres = Day::oneMonthViewOfDaysWithTelomeres($month, $year);

		if ($month == 12){
			$nextMonth = 1;
			$yearNext = $year + 1;
		} else {
			$nextMonth = $month + 1;
			$yearNext = $year;
		}

		if ($month == 1){
			$previousMonth = 12;
			$yearPrevious = $year - 1;
		} else {
			$previousMonth = $month - 1;
			$yearPrevious = $year;
		}

		return View::make('api.days.month', compact([
			'oneMonthViewOfDaysWithTelomeres',
			'nextMonth',
			'previousMonth',
			'year',
			'yearNext',
			'yearPrevious'
		]));
	}
}