<?php

use \MyApp\Advisor;

class AdvisorController extends \BaseController {

	public $advisor;

	public function __construct(Advisor $advisor)
	{
		$this->advisor = $advisor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('layouts.default');
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
		extract(Input::only('first_name', 'last_name', 'email', 'password'));

		$this->advisor->createAdvisor($first_name, $last_name, $email, $password);

		return Redirect::home();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$advisor = Advisor::find($id);

		return View::make('advisors.show', compact([
			'advisor'
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
		return View::make('layouts.default');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return View::make('layouts.default');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return View::make('layouts.default');
	}

	public function logIn()
	{
		$formData = Input::only('email', 'password');

		if (Auth::attempt($formData))
		{
			return Redirect::home();
		}

		return Redirect::home();
	}

	public function logOut()
	{
		Auth::logout();

		return Redirect::home();
	}


}
