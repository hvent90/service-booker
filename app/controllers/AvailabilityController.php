<?php

use \MyApp\Availability;

class AvailabilityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$availabilities = Availability::where('is_booked', false)->get();

		if (!$availabilities)
		{
			$availabilities = '';
		}

		return View::make('availabilities.index', compact([
			'availabilities'
		]));
	}

}
