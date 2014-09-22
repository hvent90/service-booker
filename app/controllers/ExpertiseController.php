<?php

use \MyApp\Expertise;

class ExpertiseController extends \BaseController {

	protected $expertise;

	public function __construct(Expertise $expertise)
	{
		$this->expertise = $expertise;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$expertise = Expertise::all();

		return View::make('expertise.index', compact([
			'expertise'
		]));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('expertise.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		extract(Input::only('title', 'notes', 'advisor_id'));

		$this->expertise->createExpertise($title, $notes, $advisor_id);

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
		$expertise = Expertise::find($id);

		return View::make('expertise.show', compact([
			'expertise'
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
		$expertise = Expertise::find($id);

		return View::make('expertise.edit', compact([
			'expertise'
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
		extract(Input::only('title', 'notes', 'id'));

		$this->expertise->editExpertise($title, $notes, $id);

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
		$this->expertise->destroyExpertise($id);

		return Redirect::home();
	}


}
