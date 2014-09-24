<?php

use \MyApp\Service;

class ServiceController extends \BaseController {

	protected $service;

	public function __construct(Service $service)
	{
		$this->service = $service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$services = Service::all();

		return View::make('services.index', compact([
			'services'
		]));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('services.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		extract(Input::only('name', 'notes', 'duration', 'advisor_id'));

		$this->service->createService($name, $notes, $duration, $advisor_id);

		return Redirect::route('services.index')->with('message', 'Service Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$service = Service::find($id);

		return View::make('services.show', compact([
			'service'
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
		$service = Service::find($id);

		return View::make('services.edit', compact([
			'service'
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
		extract(Input::only('name', 'notes', 'duration','id'));

		$this->service->editService($name, $notes, $duration, $id);

		return Redirect::route('services.index')->with('message', 'Service Edited');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->service->destroyService($id);

		return Redirect::route('services.index')->with('message', 'Service Destroyed');
	}


}
