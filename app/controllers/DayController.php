<?php

use \MyApp\Day;
use Carbon\Carbon;

class DayController extends BaseController {

	protected $day;

	public function __construct(Day $day)
	{
		$this->day = $day;
	}

	public function createDay()
	{
		$this->day->createDay();

		$days = Day::select()->orderBy('date', 'desc')->lists('date');
		print_r($days);
	}

	public function createNewDay()
	{
		$this->day->onNextEmptyDate($this->day->createDay());

		$days = Day::select()->orderBy('date', 'desc')->lists('date');
		print_r($days);
	}

	public function calendar()
	{
		$oneMonthViewOfDaysWithTelomeres = Day::oneMonthViewOfDaysWithTelomeres(12, 2015);

		return View::make('days.test')->with([
			'oneMonthViewOfDaysWithTelomeres' => $oneMonthViewOfDaysWithTelomeres
		]);
	}

	public function indexMonth($year, $month)
	{
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

		return View::make('days.test', compact([
			'oneMonthViewOfDaysWithTelomeres',
			'nextMonth',
			'previousMonth',
			'year',
			'yearNext',
			'yearPrevious'
		]));
	}

	public function indexDay($year, $month, $day)
	{
		$theDay = Day::findDay($year, $month, $day);

		return View::make('days.single', compact([
			'theDay'
		]));
	}
}