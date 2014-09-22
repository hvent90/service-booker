<?php namespace App\Controllers\User;

use View;

use \MyApp\Advisor;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;

use Carbon\Carbon;

class DashboardController extends \BaseController {

	public function index()
	{
		return View::make('user.index', compact([
		]));
	}

}