<?php namespace App\Controllers\Admin;

use View;
use DB;
use \MyApp\Availability;
use \MyApp\Advisor;
use \MyApp\Meeting;
use \MyApp\Day;
use \MyApp\Location;
use \MyApp\Requestee;
use Carbon\Carbon;

class ActivityController extends \BaseController {

	protected $day;
	protected $meeting;
	protected $advisor;

	public function __construct(Day $day, Meeting $meeting, Advisor $advisor)
	{
		$this->day = $day;
		$this->meeting = $meeting;
		$this->advisor = $advisor;
	}

	public function seeBookedAvailabilities()
	{
		$availabilityIds = [];

		foreach (Availability::all() as $availability) {
			if ($availability->hasRequests()) {
				$availabilityIds[] = $availability->id;
			}
		}
		if(!$availabilityIds) {
			$availabilities = null;
			return View::make('admin.active-availabilities', compact(['availabilities']));
		}

		$availabilities = DB::table('availabilities')
							->select(
								'advisors.first_name as advisor_first_name',
							    'advisors.last_name as advisor_last_name',
							    'advisors.email as advisor_email',
							    'advisors.profile_img as advisor_profile_img',
							    'requestees.name as requestee_name',
							    'requestees.email as requestee_email',
							    'requestees.phone as requestee_phone',
							    'requestees.notes as requestee_notes',
							    'availability_day.time as time',
							    'days.date as date',
							    'locations.name as location',
							    'meetings.status as status'
							)
							->leftJoin('availability_day', 'availabilities.id', '=', 'availability_day.availability_id')
							->leftJoin('availability_advisor', 'availabilities.id', '=', 'availability_advisor.availability_id')
							->leftJoin('availability_location', 'availabilities.id', '=', 'availability_location.availability_id')
							->leftJoin('meeting_availability', 'availabilities.id', '=', 'meeting_availability.availability_id')
							->leftJoin('meetings', 'meeting_availability.meeting_id', '=', 'meetings.id')
							->leftJoin('meeting_requestee', 'meetings.id', '=', 'meeting_requestee.meeting_id')
							->leftJoin('days', 'availability_day.day_id', '=', 'days.id')
							->leftJoin('advisors', 'availability_advisor.advisor_id', '=', 'advisors.id')
							->leftJoin('locations', 'availability_location.location_id', '=', 'locations.id')
							->leftJoin('requestees', 'meeting_requestee.requestee_id', '=', 'requestees.id')
							->whereIn('availabilities.id', $availabilityIds)
							->where('availabilities.expired', 0)
							// ->groupBy('advisors.id')
							->orderBy('days.date')
							->get();

		return View::make('admin.active-availabilities', compact(['availabilities']));
	}
}