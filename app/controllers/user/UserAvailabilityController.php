<?php namespace App\Controllers\User;

use View, Input, Redirect, Auth;

use \MyApp\Advisor;
use \MyApp\Availability;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;


use Carbon\Carbon;

class UserAvailabilityController extends \BaseController {

	protected $availability;
	protected $service;
	protected $day;

	public function __construct(Availability $availability, Service $service, Day $day)
	{
		$this->day = $day;
		$this->availability = $availability;
		$this->service      = $service;
		$dayFormPopulator              = Day::lists('date', 'id');
		$locationFormPopulator         = Location::lists('name', 'id');
		$advisorAvailabilities         = Auth::user()->availabilities();
		$servicesContainedByAdvisor    = $this->service->servicesContainedByAdvisor(Auth::user()->id);



		View::share('servicesContainedByAdvisor',    $servicesContainedByAdvisor);
		View::share('locationFormPopulator',         $locationFormPopulator);
		View::share('advisorAvailabilities',         $advisorAvailabilities);
		View::share('dayFormPopulator',              $dayFormPopulator);
	}

	public function create()
	{
		$dt    = Carbon::today();
		$month = $dt->month;
		$year  = $dt->year;

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

		return View::make('user.availabilities.create', compact([
			'oneMonthViewOfDaysWithTelomeres',
			'nextMonth',
			'previousMonth',
			'year',
			'yearNext',
			'yearPrevious'
		]));
	}

	public function store()
	{
		$dt = Day::formatTime(Input::get('datetime'));

		$this->availability->CreateAvailability(
			Input::get('title'),
			Input::get('notes'),
			Input::get('services'),
			Input::get('locations'),
			Input::get('advisor_id'),
			$dt
		);

		return Redirect::route('dashboard.index')->with('message', 'Availability Added');
	}

	public function destroy()
	{
		$this->availability->destroyAvailability(Input::get('avail_id'));

		return Redirect::route('dashboard.index')->with('message', 'Availability Removed');

	}

}