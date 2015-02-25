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

class DashboardController extends \BaseController {

	public function index()
	{
		$availabilitiesByDay = Availability::select(
				DB::raw('COUNT(availabilities.id) as count'),
				'days.date as date'
			)
			->leftJoin('availability_day', 'availabilities.id', '=', 'availability_day.availability_id')
			->leftJoin('days', 'availability_day.day_id', '=', 'days.id')
			->leftJoin('availability_advisor', 'availabilities.id', '=', 'availability_advisor.availability_id')
			->leftJoin('advisors', 'availability_advisor.advisor_id', '=', 'advisors.id')
			->whereBetween('days.date', [Carbon::now()->subDays(4)->toDateString(), Carbon::now()->addDays(4)->toDateString()])
			->groupBy('days.id')
			->orderBy('days.id', 'asc')
			->get();

		$availabilitiesByAdvisor = Availability::select(
				DB::raw('COUNT(availabilities.id) as count'),
				DB::raw('CONCAT(advisors.first_name, " ", advisors.last_name) as advisor_name'),
				'advisors.email as advisor_email'
			)
			->leftJoin('availability_day', 'availabilities.id', '=', 'availability_day.availability_id')
			->leftJoin('days', 'availability_day.day_id', '=', 'days.id')
			->leftJoin('availability_advisor', 'availabilities.id', '=', 'availability_advisor.availability_id')
			->leftJoin('advisors', 'availability_advisor.advisor_id', '=', 'advisors.id')
			->whereBetween('days.date', [Carbon::now()->subDays(4)->toDateString(), Carbon::now()->addDays(5)->toDateString()])
			->groupBy('advisors.id')
			->orderBy('count', 'asc')
			->get();

		$availabilitiesByLocation = Availability::select(
				DB::raw('COUNT(availabilities.id) as count'),
				'locations.name as location_name'
			)
			->leftJoin('availability_day', 'availabilities.id', '=', 'availability_day.availability_id')
			->leftJoin('days', 'availability_day.day_id', '=', 'days.id')
			->leftJoin('availability_location', 'availabilities.id', '=', 'availability_location.availability_id')
			->leftJoin('locations', 'availability_location.location_id', '=', 'locations.id')
			->whereBetween('days.date', [Carbon::now()->subDays(4)->toDateString(), Carbon::now()->addDays(5)->toDateString()])
			->groupBy('locations.id')
			->orderBy('count', 'asc')
			->get();

		//var_dump($availabilitiesByDay);
	        //dd($availabilitiesByAdvisor);
		//exit;

		return View::make('admin.index', compact([
				'availabilitiesByDay',
				'availabilitiesByAdvisor',
				'availabilitiesByLocation'
			]));
	}

}
