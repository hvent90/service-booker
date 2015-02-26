<?php namespace App\Controllers\User;

use View, Input, Redirect, Auth;

use \MyApp\Advisor;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;

use Carbon\Carbon;

class UserServiceController extends \BaseController {

	protected $service;

	public function __construct(Service $service)
	{
		$this->beforeFilter('expired-session-check');
		
		$this->service = $service;
		$servicesNotContainedByAdvisor = $this->service->servicesNotContainedByAdvisor(Auth::user()->id);
		$servicesContainedByAdvisor    = $this->service->servicesContainedByAdvisor(Auth::user()->id);
		$locationFormPopulator         = Location::lists('name', 'id');

		View::share('servicesNotContainedByAdvisor', $servicesNotContainedByAdvisor);
		View::share('servicesContainedByAdvisor',    $servicesContainedByAdvisor);
		view::share('locationFormPopulator',         $locationFormPopulator);
	}

	public function connect()
	{

		return View::make('user.services.connect', compact([
		]));
	}

	public function store()
	{
		$this->service->connectServiceWithLocation(
			Input::get('services'),
			Input::get('advisor_id'),
			Input::get('locations')
		);

	 	return Redirect::route('dashboard.index')->with('message', 'Service Added');
	}

	public function destroy()
	{
		$this->service->disconnectService(Input::get('services'), Input::get('advisor_id'));

		return Redirect::route('dashboard.index')->with('message', 'Service Removed');

	}

}