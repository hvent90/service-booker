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

		if ($id == 'all') {
			$advisors = Advisor::where('permissions', '<', 999)->get()->sortBy('last_name');

			return View::make('api.advisors.with-expertise-group', compact([
				'advisors'
			]));
		}

		// $advisors = $expertiseGroup->getAdvisorsWhoHaveAnAvailabilityWithinGroup();

		$advisors = $expertiseGroup->getAdvisorsWhoHaveAnExpertiseWithinGroup('randomize');

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

	public function getGroupsJson()
	{
		return ExpertiseGroup::all()->toJson();
	}

	public function getAdvisorsOfGroupJson($expGroupId)
	{
		$group = ExpertiseGroup::find($expGroupId);

		$advisors = $group->getAdvisorsWhoHaveAnExpertiseWithinGroup();

		foreach($advisors as $advisor) {
			$advisor->toJson();
		}

		return $advisors;
	}

	public function getActiveAdvisorsOfGroupJson($expGroupId)
	{
		$group = ExpertiseGroup::find($expGroupId);

		$advisors = $group->getAdvisorsAndAvailWhoHaveAnAvailabilityWithinGroup();

		foreach($advisors as $advisor) {
			foreach($advisor as $jaun) {
				$jaun->toJson();
			}
		}

		return $advisors;
	}

}