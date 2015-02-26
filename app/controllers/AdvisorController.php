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
		extract(Input::only('first_name', 'last_name', 'email', 'password', 'bio', 'linkedin'));

		if (Input::has('image')) {
			if (Input::file('image')->isValid()) {
				$this->advisor->createAdvisor(
					$first_name,
					$last_name,
					$email,
					$password,
					$bio,
					$linkedin,
					Input::file('image')
				);
			}
		} else {
			$this->advisor->createAdvisor(
				$first_name,
				$last_name,
				$email,
				$password,
				$bio,
				$linkedin
			);
		}

		$this->advisor->createAdvisor($first_name, $last_name, $email, $password, $bio, $linkedin);

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

		if(Auth::user()->id !== $id) {
			if(Auth::user()->permissions < 100) {
				return Redirect::route('home');
			}
		}


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
		extract(Input::only('first_name', 'last_name', 'email', 'password', 'id', 'bio', 'linkedin'));
		if (Input::file('image')) {
			if (Input::file('image')->isValid()) {
				$this->advisor->editAdvisor(
					$first_name,
					$last_name,
					$email,
					$password,
					$id,
					$bio,
					$linkedin,
					Input::file('image')
				);
			}
		} else {
			$this->advisor->editAdvisor(
				$first_name,
				$last_name,
				$email,
				$password,
				$id,
				$bio,
				$linkedin
			);
		}


		return Redirect::route('dashboard.index')->with('message', 'Profile Updated.');
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

		if ($advisor == null) {
			return Redirect::home()->with('message', 'There was no account associated with the email you provided.');
		}

		$advisorName = $advisor->first_name. ' '.$advisor->last_name;

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

	public function imageTest()
	{
		if (Input::file('image')->isValid())
		{
			Image::make(Input::file('image'))
				// resize the image to a width of 300 and constrain aspect ratio (auto height)
				->resize(300, null, function ($constraint) {
				    $constraint->aspectRatio();
				})
				->save('img/profile/'.Input::get('name').'.jpg');
		}
	}


}
