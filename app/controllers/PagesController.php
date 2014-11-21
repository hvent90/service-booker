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

	public function remote()
	{
		return View::make('cxp.remote');
	}

	public function composeEmailToAdvisors()
	{
		return View::make('emails.compose.all-advisors');
	}

	public function sendEmailToAdvisors()
	{
		extract(Input::only('subject', 'body'));

		$advisors = Advisor::all();

		foreach ($advisors as $advisor) {
			$advisorName = $advisor->first_name.' '.$advisor->last_name;

			$data = [
				'body'        => $body,
				'advisorName' => $advisorName
			];

			\Mail::queue('emails.compose.all-advisors-template', $data, function($message) use ($advisor, $advisorName, $subject) {
	    		$message->to($advisor->email, $advisorName)
	    			->subject($subject);
	    	});
		}

		return Redirect::route('home');
	}
}
