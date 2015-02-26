<?php namespace App\Controllers\User;

use View, Input, Redirect, Auth;

use \MyApp\Advisor;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;
use \MyApp\ExpertiseGroup;

use Carbon\Carbon;

class UserExpertiseController extends \BaseController {

	protected $expertise;

	public function __construct(Expertise $expertise)
	{
		$this->beforeFilter('expired-session-check');
		
		$this->expertise = $expertise;
		$expertiseNotContainedByAdvisor = $this->expertise->expertiseNotContainedByAdvisor(Auth::user()->id);
		$expertiseContainedByAdvisor = $this->expertise->expertiseContainedByAdvisor(Auth::user()->id);

		View::share('expertiseNotContainedByAdvisor', $expertiseNotContainedByAdvisor);
		View::share('expertiseContainedByAdvisor', $expertiseContainedByAdvisor);
	}

	public function connect()
	{
		$expertiseGroups = ExpertiseGroup::all();

		return View::make('user.expertise.connect', compact([
			'expertiseGroups'
		]));
	}

	public function store()
	{
		if(Expertise::where('title', Input::get('expertise'))->first()) {

			$this->expertise->connectExpertiseToAdvisor(Input::get('expertise'), Input::get('advisor_id'));

			return 'added';

		} else {
			if(!Input::get('expertiseGroups')) {
				return 'create';
			} else {
				$expertise = $this->expertise->createExpertise(Input::get('expertise'), 'Description', Input::get('advisor_id'));
				$this->expertise->connectExpertiseToAdvisor(Input::get('expertise'), Input::get('advisor_id'));
				$expertiseGroupsIds = explode(',', Input::get('expertiseGroups'));

				$this->expertise->connectExpertiseToExpertiseGroup($expertise, $expertiseGroupsIds);

				return 'expG received';
			}
		}

	}

	public function destroy()
	{
		extract(Input::only('advisor_id', 'expertisesToRemove'));

		$this->expertise->disconnectExpertiseToAdvisor($expertisesToRemove, $advisor_id);

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

		\Mail::queue('emails.expertise.request-new', $data, function($message) {
    		$message->to('hvent90@gmail.com', 'Henry Ventura')
    			->subject('An advisor has requested a new expertise.');
    	});

    	\Mail::queue('emails.expertise.request-new', $data, function($message) {
    		$message->to('ben@walnutstlabs.com', 'Ben Bock')
    			->subject('An advisor has requested a new expertise.');
    	});

    	return Redirect::route('dashboard.index')->with('message', 'Your request has been submitted.');
	}

}