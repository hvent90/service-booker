<?php

class RegistrationController extends BaseController {

	public function createAdvisor()
	{
		return View::make('advisor.new');
	}

	public function storeAdvisor()
	{
		// If form validation passes:
		$advisor = new Advisor;
		$advisor->name = Input::get('name');
		$advisor->email = Input::get('email');
		$advisor->password = Hash::make(Input::get('password'));
		$advisor->save();

		Auth::attempt(['email' => $advisor->email, 'password' => Input::get('password')]);

		return Redirect::intended('advisor.dashboard');
	}

	public function createService()
	{
		return View::make('advisor.service.new');
	}

	public function storeService()
	{
		$advisor = Auth::user();

		// If form validation passes:
		$service = new Service;
		$service->name = Input::get('name');

		if (Input::get('notes'))
			$service->notes = Input::get('notes');

		$service->save();

		$advisor->services()->save($service);

		return Redirect::intended('advisor.dashboard');
	}

	public function createCompany()
	{
		return View::make('company.new');
	}

	public function StoreCompany()
	{
		$advisor = Auth::user();

		// If form validation passes:
		$company = new Company;
		$company->name = Input::get('name');
		$company->email = Input::get('email');

		if (Input::get('website'))
			$company->website = Input::get('website');

		$company->admin_advisor_id = $advisor->id;
		$company->save();

		$advisor->companies()->save($company);

		return Redirect::intended('advisor.dashboard');
	}

	public function createLocation()
	{
		return View::make('location.new');
	}

	public function storeLocation()
	{
		$advisor = Auth::user();

		// If form validation passes:
		$location = new Company;
		$location->name = Input::get('name');

		if (Input::get('email'))
			$location->email = Input::get('email');
		if (Input::get('website'))
			$location->website = Input::get('website');

		if (Input::get('company_id'))
			$location->company_id = Input::get('company_id');

		$location->advisor_id = $advisor->id;

		$location->save();

		return Redirect::intended('advisor.dashboard');
	}

	public function createExpertise()
	{
		return View::make('expertise.new');
	}

	public function storeExpertise()
	{
		$expertise = new Expertise;
		$expertise->title = Input::get('title');
		$expertise->notes = Input::get('notes');
		$expertise->save();

		return Redirect::intended('advisor.dashboard');
	}

	public function createMeeting()
	{
		return View::make('meeting.new');
	}

	public function storeMeeting()
	{
		$advisor = Auth::user();
		$day = Day::find(Input::get('day_id'));

		// If form validation passes:
		$meeting = new Meeting;
		$meeting->title = Input::get('title');

		if (Input::get('notes'))
			$meeting->notes = Input::get('notes');

		$meeting->save();

		$meeting->days()->save($day);

		$advisor->meetings()->save($meeting);

		return Redirect::attempt('advisor.dashboard');
	}

	public function storeDay()
	{
		$day = new Day;
		dd($day);
	}

}
