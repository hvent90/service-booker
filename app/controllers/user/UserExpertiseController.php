<?php namespace App\Controllers\User;

use View, Input, Redirect, Auth;

use \MyApp\Advisor;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;

use Carbon\Carbon;

class UserExpertiseController extends \BaseController {

	protected $expertise;

	public function __construct(Expertise $expertise)
	{
		$this->expertise = $expertise;
		$expertiseNotContainedByAdvisor = $this->expertise->expertiseNotContainedByAdvisor(Auth::user()->id);
		$expertiseContainedByAdvisor = $this->expertise->expertiseContainedByAdvisor(Auth::user()->id);

		View::share('expertiseNotContainedByAdvisor', $expertiseNotContainedByAdvisor);
		View::share('expertiseContainedByAdvisor', $expertiseContainedByAdvisor);
	}

	public function connect()
	{

		return View::make('user.expertise.connect', compact([
		]));
	}

	public function store()
	{
		$userExpertises = Advisor::find(Input::get('advisor_id'))->expertise()->get();
		$index = 0;

		foreach ($userExpertises as $exp) {
			$index++;
		}
		if ($index == 4) {
			return Redirect::route('dashboard.index')->with('message', 'You may only have a maximum of 4 expertises.');
		}

		$this->expertise->connectExpertiseToAdvisor(Input::get('expertise'), Input::get('advisor_id'));

		return Redirect::route('dashboard.index')->with('message', 'Expertise Added');
	}

	public function destroy()
	{
		$this->expertise->disconnectExpertiseToAdvisor(Input::get('expertise'), Input::get('advisor_id'));

		return Redirect::route('dashboard.index')->with('message', 'Expertise Removed');

	}

	public function requestNewExpertise()
	{
		$advisor = Advisor::find(Input::get('advisor_id'));

		$this->expertise->createExpertise(Input::get('requestedExpertise'), 'Description goes here.', $advisor->id, true);

		$data = [
			'expertise'    => Input::get('requestedExpertise'),
			'advisorEmail' => $advisor->email,
			'advisorName'  => $advisor->first_name.' '.$advisor->last_name
		];

		// \Mail::queue('emails.expertise.request-new', $data, function($message) {
  //   		$message->to('hvent90@gmail.com', 'Henry Ventura')
  //   			->subject('An advisor has requested a new expertise.');
  //   	});

  //   	\Mail::queue('emails.expertise.request-new', $data, function($message) {
  //   		$message->to('ben@walnutstlabs.com', 'Ben Bock')
  //   			->subject('An advisor has requested a new expertise.');
  //   	});

    	return Redirect::route('dashboard.index')->with('message', 'Your request has been submitted.');
	}

}