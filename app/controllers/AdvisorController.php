<?php

use \MyApp\Advisor;
use \MyApp\Availability;
use \MyApp\ExpertiseGroup;

class AdvisorController extends \BaseController {

	public $advisor;
	public $availability;
	public $expertiseGroup;

	public function __construct(Advisor $advisor, Availability $availability, ExpertiseGroup $expertiseGroup)
	{
		$this->advisor = $advisor;
		$this->availability = $availability;
		$this->expertiseGroup = $expertiseGroup;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$advisors = Advisor::all();

		return View::make('advisors.index', compact([
			'advisors'
		]));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('advisors.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		extract(Input::only('first_name', 'last_name', 'email', 'password', 'bio'));

		$this->advisor->createAdvisor($first_name, $last_name, $email, $password, $bio);

		return Redirect::home();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $firstName, $lastName)
	{
		$advisor = Advisor::find($id);

		$this->availability->scrubExpiredAvailabilities();

		$expertiseGroups = ExpertiseGroup::all();

		return View::make('advisors.show', compact([
			'advisor',
			'expertiseGroups'
		]));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$advisor = Advisor::find($id);

		return View::make('advisors.edit', compact([
			'advisor'
		]));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		extract(Input::only('first_name', 'last_name', 'email', 'password', 'id', 'bio'));

		if (Auth::user() !== Advisor::find($id) OR $currentUser->permissions < 100) {
			return Redirect::home();
		}

		$this->advisor->editAdvisor($first_name, $last_name, $email, $password, $id, $bio);

		return Redirect::home();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->advisor->destroyAdvisor($id);

		return Redirect::home();
	}

	public function logIn()
	{
		$formData = Input::only('email', 'password');

		if (Auth::attempt($formData))
		{
			return Redirect::home();
		}

		return Redirect::home()->with('message', 'You have entered incorrect login information. You can <a href="/reset-password"/>Reset your password</a>.');
	}

	public function logOut()
	{
		Auth::logout();

		return Redirect::home();
	}

	public function resetPassword()
	{
		$advisor = Advisor::where('email', Input::get('email'))->first();
		$advisorName = $advisor->first_name. ' '.$advisor->last_name;

		if ($advisor == null) {
			return Redirect::home()->with('message', 'There was no account associated with the email you provided.');
		}

		$newPassword = str_random(8);

		$data = [ 'newPassword' => $newPassword ];

		$advisor->password = Hash::make($newPassword);
		$advisor->save();

		\Mail::queue('emails.user.new-password', $data, function($message) use ($advisor, $advisorName) {
    		$message->to($advisor->email, $advisorName)
    			->subject('You have been assigned a new password.');
    	});

		return Redirect::home()->with('message', 'Your new password will be sent to your email shortly.');
	}

	public function requestNewPassword()
	{
		return View::make('user.reset-password');
	}


}
