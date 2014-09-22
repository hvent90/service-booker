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

	public function __construct(Availability $availability, Service $service)
	{
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
		return View::make('user.availabilities.create', compact([
		]));
	}

	public function store()
	{
		$this->availability->CreateAvailability(
			Input::get('title'),
			Input::get('notes'),
			Input::get('services'),
			Input::get('days'),
			Input::get('locations'),
			Input::get('advisor_id')
		);

		return Redirect::home();
	}

	public function destroy()
	{
		$this->availablity->destroyAvailability(Input::get('availabilities'));

		return Redirect::home();

	}

}