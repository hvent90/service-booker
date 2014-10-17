<?php

use \MyApp\Advisor;
use \MyApp\ExpertiseGroup;

class PagesController extends \BaseController {

	protected $advisor;

	public function __construct(Advisor $advisor)
	{
		$this->advisor = $advisor;
	}

	public function home()
	{
		$expertiseGroups = ExpertiseGroup::all();

		return View::make('cxp.index', compact([
			'expertiseGroups'
		]));
	}

}
