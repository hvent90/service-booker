<?php

use \MyApp\Expertise;
use \MyApp\ExpertiseGroup;

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
		$expertise = Expertise::where('requested', '!=', true)->get();
		$requested = Expertise::where('requested', true)->get();

		return View::make('expertise.index', compact([
			'expertise',
			'requested'
		]));
	}

	public function approve($id)
	{
		$expertise 		 = Expertise::find($id);
		$expertiseGroups = ExpertiseGroup::all();

		return View::make('expertise.approve', compact([
			'expertise',
			'expertiseGroups'
		]));
	}

	public function submitApproval()
	{
		extract(Input::only('id', 'title', 'notes', 'expertiseGroups'));

		$expertise = Expertise::find($id);
		$expertise->approve('title', 'notes', 'expertiseGroups');
		dd($expertiseGroups);
		dd('test');

		return Redirect::route('expertise.index')->with('message', 'Expertise has been approved.');
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

		return Redirect::route('expertise.index')->with('message', 'Expertise Created');
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

		return Redirect::route('expertise.index')->with('message', 'Expertise Edited');
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

		return Redirect::route('expertise.index')->with('message', 'Expertise Destroyed');
	}

	public function connect($id)
	{
		$expertise = Expertise::find($id);
		$expertiseGroupsNotContainedByExpertise = $expertise->expertiseGroupsNotContainedByExpertise();
		$expertiseGroupsContainedByExpertise    = $expertise->expertiseGroupsContainedByExpertise();

		return View::make('expertise.connect-group', compact([
			'expertiseGroupsNotContainedByExpertise',
			'expertiseGroupsContainedByExpertise',
			'expertise'
		]));
	}

	public function connectToExpertiseGroup()
	{
		$expertise_id 	   = Input::get('expertise_id');
		$expertiseGroup_id = Input::get('expertiseGroup_id');

		$this->expertise->connectExpertiseToExpertiseGroup($expertise_id, $expertiseGroup_id);

		return Redirect::route('expertise.index')->with('message', 'Expertise Groups Connected');
	}

	public function disconnectToExpertiseGroup()
	{
		$expertise_id 	   = Input::get('expertise_id');
		$expertiseGroup_id = Input::get('expertiseGroup_id');

		$this->expertise->disconnectExpertiseToExpertiseGroup($expertise_id, $expertiseGroup_id);

		return Redirect::route('expertise.index')->with('message', 'Expertise Groups Disconnected');
	}


}
