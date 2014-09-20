<?php namespace App\Controllers\Api;

use \MyApp\Day;
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
}