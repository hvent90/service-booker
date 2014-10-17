<?php

use \MyApp\Expertise;
use \MyApp\ExpertiseGroup;

class ExpertiseGroupController extends \BaseController {

	protected $expertise;
	protected $expertiseGroup;

	public function __construct(Expertise $expertise, ExpertiseGroup $expertiseGroup)
	{
		$this->expertise = $expertise;
		$this->expertiseGroup = $expertiseGroup;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$expertiseGroups = ExpertiseGroup::all();

		return View::make('expertise-groups.index', compact([
			'expertiseGroups'
		]));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('expertise-groups.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		extract(Input::only('name', 'description'));

		$this->expertiseGroup->createExpertiseGroup($name, $description);

		return Redirect::route('expertise-groups.index')->with('message', 'Expertise Group Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$expertiseGroup = ExpertiseGroup::find($id);

		return View::make('expertise-groups.show', compact([
			'expertiseGroup'
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
		$expertiseGroup = ExpertiseGroup::find($id);

		return View::make('expertise-groups.edit', compact([
			'expertiseGroup'
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
		extract(Input::only('name', 'description', 'id'));

		$this->expertiseGroup->editExpertiseGroup($name, $description, $id);

		return Redirect::route('expertise-groups.index')->with('message', 'Expertise Edited');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->expertiseGroup->destroyExpertiseGroup($id);

		return Redirect::route('expertise-groups.index')->with('message', 'Expertise Destroyed');
	}


}
