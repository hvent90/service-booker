<?php

use \MyApp\Location;

class LocationController extends \BaseController {

	protected $location;

	public function __construct(Location $Location)
	{
		$this->location = $Location;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = Location::all();

		return View::make('locations.index', compact([
			'locations'
		]));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('locations.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		extract(Input::only('name', 'address', 'website', 'id'));

		$this->location->createLocation($name, $address, $website, $id);

		return Redirect::route('locations.index')->with('message', 'Location Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$location = Location::find($id);

		return View::make('locations.show', compact([
			'location'
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
		$location = Location::find($id);

		return View::make('locations.edit', compact([
			'location'
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
		extract(Input::only('name', 'address', 'website', 'advisor_id', 'id'));

		$this->location->editLocation($name, $address, $website, $advisor_id, $id);

		return Redirect::route('locations.index')->with('message', 'Location Edited');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->location->destroyLocation($id);

		return Redirect::route('locations.index')->with('message', 'Location Destroyed');
	}


}
