<?php namespace App\Controllers\User;

use View;
use Auth;

use \MyApp\Advisor;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;

use Carbon\Carbon;

class DashboardController extends \BaseController {

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

}