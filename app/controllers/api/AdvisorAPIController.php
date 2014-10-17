<?php namespace App\Controllers\Api;

use View, Redirect;

use \MyApp\Advisor;
use \MyApp\Service;
use \MyApp\Availability;
use \MyApp\Expertise;

use Carbon\Carbon;

class AdvisorAPIController extends \BaseController {

	protected $service;

	public function __construct(Service $service)
	{
		$this->service = $service;
	}

	public function getAdvisor($advisor_id)
	{
		if ( Advisor::find($advisor_id) != null ) {
			$advisor = Advisor::find($advisor_id);

			return $advisor;
		} else { return Redirect::route('home'); }
	}

	public function getServicesByAdvisor($advisor_id)
	{
		$services = $this->service->servicesContainedByAdvisor($advisor_id, 'api');

		return $services;
	}

	public function getAdvisorsWhoHaveAvailabilitiesWithGivenExpertise()
	{
		$expertise_id = \Request::get('expertise_id');

		$givenExpertise = Expertise::find($expertise_id);

		$advisorsWithExpertise = $givenExpertise->advisors()->get();

		$advisorsWithAvailability = [];

		foreach ($advisorsWithExpertise as $adv) {
			if ($adv->availabilities->first() != null) {
				$advisorsWithAvailability[] = $adv;
			}
		}

		return View::make('api.advisors.with-expertise', compact([
			'advisorsWithAvailability'
		]));
	}

}