<?php namespace App\Controllers\User;

use View, Input, Redirect, Auth, DB, Artisan;
use \MyApp\Advisor;
use \MyApp\Availability;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\RecurringAvailability;
use \MyApp\Service;
use Carbon\Carbon;

class UserAvailabilityController extends \BaseController {

	protected $availability;
	protected $service;
	protected $day;

	public function __construct(Availability $availability, Service $service, Day $day)
	{
		$this->beforeFilter('expired-session-check');

		$this->day = $day;
		$this->availability = $availability;
		$this->service      = $service;
		$dayFormPopulator              = Day::lists('date', 'id');
		$locationFormPopulator         = Location::lists('name', 'id');
		$advisorAvailabilities         = Auth::user()->availabilities();
		$servicesContainedByAdvisor    = $this->service->servicesContainedByAdvisor(Auth::user()->id);
		$firstService                  = $this->service->justTheFirstServiceBecauseMyCodeSucks(Auth::user()->id);

		View::share('firstService',    			     $firstService);
		View::share('locationFormPopulator',         $locationFormPopulator);
		View::share('advisorAvailabilities',         $advisorAvailabilities);
		View::share('dayFormPopulator',              $dayFormPopulator);
	}

	public function create()
	{
		$locations = Location::all();
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

		$recurringAvailabilities = RecurringAvailability::where('advisor_id', Auth::user()->id)->get();

		return View::make('user.availabilities.create', compact([
			'oneMonthViewOfDaysWithTelomeres',
			'nextMonth',
			'previousMonth',
			'year',
			'yearNext',
			'yearPrevious',
			'locations',
			'recurringAvailabilities'
		]));
	}

	public function store()
	{
		$times = json_decode(Input::get('day_ids'));

		if($times == null) {
			return Redirect::route('user.availabilities.create')->with('message', 'You must fill in all of the required inputs.');
		}

		if(current($times) == null) {
			return Redirect::route('user.availabilities.create')->with('message', 'You must fill in all of the required inputs.');
		}

		if(current($times)[0] == null) {
			return Redirect::route('user.availabilities.create')->with('message', 'You must fill in all of the required inputs.');
		}

		$safety = 0;
		foreach($times as $key => $value) {
			foreach($value as $val) {
				$safety++;
			}

			if($safety < 3) {
				return Redirect::route('user.availabilities.create')->with('message', 'You must fill in all of the required inputs.');
			}
			$safety = 0;
		}

		foreach ($times as $key => $value) {
			$this->availability->createAvailability($value, $key, Input::get('advisor_id'), Input::get('service_id'));
		}

		return Redirect::route('dashboard.index')->with('message', 'Availability Added');
	}

	public function storeRecur()
	{
		$time = (int) Input::get('time');

		if (Input::get('am_pm') == 'pm' && $time != 12) {
			$time = $time + 12;
		} else if (Input::get('am_pm') == 'am' && $time == 12) {
			$time = 0;
		}

		$values = [
			'advisor_id'  => Input::get('advisor_id'),
			'location_id' => Input::get('location_id'),
			'service_id'  => Input::get('service_id'),
			'day_of_week' => Input::get('day'),
			'time' => $time
		];

		$recurAvail = RecurringAvailability::create($values);

		Artisan::call('availabilities:generate-recurring');

		return Redirect::route('dashboard.index')->with('message', 'Recurring Availability Added');
	}

	public function destroy()
	{
		$this->availability->destroyAvailability(Input::get('avail_id'));

		return Redirect::route('dashboard.index')->with('message', 'Availability Removed');

	}

	public function destroyRecur($recurAvailId)
	{
		RecurringAvailability::find($recurAvailId)->delete();

		return Redirect::route('dashboard.index')->with('message', 'Recurring Availability Removed');
	}

}