<?php

use \MyApp\Advisor;
use \MyApp\ExpertiseGroup;
use \MyApp\Availability;

class PagesController extends \BaseController {

	protected $advisor;
	protected $availability;

	public function __construct(Advisor $advisor, Availability $availability)
	{
		$this->advisor 	    = $advisor;
		$this->availability = $availability;
	}

	public function home()
	{
		$this->availability->scrubExpiredAvailabilities();

		$expertiseGroups = ExpertiseGroup::all();

		return View::make('cxp.index', compact([
			'expertiseGroups'
		]));
	}

}
