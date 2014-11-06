<?php namespace App\Controllers\Api;

use View, Redirect;

use \MyApp\Advisor;
use \MyApp\Service;
use \MyApp\Availability;
use \MyApp\Expertise;
use \MyApp\ExpertiseGroup;

use Carbon\Carbon;

class AvailabilityAPIController extends \BaseController {

	public function getAvailabilityRequestForm($id)
	{
		$availability = Availability::find($id);

		return View::make('api.availabilities.request-form', compact([
			'availability'
		]));
	}

	public function getAllAvailabilities()
	{
		$availabilities = Availability::all();

		return \Response::json($availabilities);
	}

}