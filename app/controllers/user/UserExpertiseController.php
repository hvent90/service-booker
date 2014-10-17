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
		$this->expertise->connectExpertiseToAdvisor(Input::get('expertise'), Input::get('advisor_id'));

		return Redirect::route('dashboard.index')->with('message', 'Expertise Added');
	}

	public function destroy()
	{
		$this->expertise->disconnectExpertiseToAdvisor(Input::get('expertise'), Input::get('advisor_id'));

		return Redirect::route('dashboard.index')->with('message', 'Expertise Removed');

	}

}