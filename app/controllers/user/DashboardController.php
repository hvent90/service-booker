<?php namespace App\Controllers\User;

use View;
use Auth;

use \MyApp\Advisor;
use \MyApp\Availability;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;
use \MyApp\Meeting;

use Carbon\Carbon;

class DashboardController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('expired-session-check');
	}

	public function index()
	{
		$currentUser = Auth::user();

		$pendingMeetingRequests = $currentUser->meetings()->where('status', '=', 0)->get();

		$acceptedMeetings = $currentUser->meetings()->where('status', '=', 1)->get();

		return View::make('user.index', compact([
			'pendingMeetingRequests',
			'acceptedMeetings'
		]));
	}

	public function showRequests()
	{
		$availability = Availability::find(\Input::get('availability_id'));

		$meetings = $availability->meetings()->where('status', '0')->get();

		return View::make('user.availabilities.requests', compact([
			'meetings'
		]));
	}

	public function showBookedRequest()
	{
		$availability = Availability::find(\Input::get('availability_id'));

		$meeting = $availability->meetings()->where('status', '1')->first();

		return View::make('user.availabilities.booked-request', compact([
			'meeting'
		]));
	}

}