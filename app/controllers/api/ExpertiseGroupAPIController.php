<?php namespace App\Controllers\Api;

use View, Redirect;

use \MyApp\Advisor;
use \MyApp\Service;
use \MyApp\Availability;
use \MyApp\Expertise;
use \MyApp\ExpertiseGroup;

use Carbon\Carbon;

class ExpertiseGroupAPIController extends \BaseController {

	protected $expertiseGroup;

	public function __construct(ExpertiseGroup $expertiseGroup)
	{
		$this->expertiseGroup = $expertiseGroup;
	}

	public function getExpertiseGroup()
	{
		$expertiseGroup = ExpertiseGroup::find(\Request::get('expertiseGroup_id'));

		return View::make('api.expertise-groups.homepage', compact([
			'expertiseGroup'
		]));
	}

	public function getAdvisorsInGroup($id)
	{
		$expertiseGroup = ExpertiseGroup::find($id);
		$advisors       = $expertiseGroup->getAdvisorsWhoHaveAnAvailabilityWithinGroup();

		if ($advisors == false) {
			$advisors = '<h2>There are currently no advisors with an availability.</h2>';

			return View::make('api.advisors.with-expertise-group-none', compact([
				'advisors'
			]));
		}
		return View::make('api.advisors.with-expertise-group', compact([
			'advisors'
		]));
	}

}