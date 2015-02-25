<?php namespace MyApp;

class Service extends \Eloquent {

	/**
	 * Creates a new service and returns the service Object.
	 * @return [type] [description]
	 */
	public function createService($name, $notes, $duration, $id = null)
	{
		$advisor = Advisor::find($id);

		$service = new Service;
		$service->name     = $name;
		$service->duration = $duration;
		$service->notes    = $notes;
		$service->save();

		if ($id == null)
		{
			return $service;
		}

		$advisor->services()->attach($service);

		return $service;
	}

	/**
	 * Edits an existing service and returns the service Object.
	 * @return [type] [description]
	 */
	public function editService($name, $notes, $duration, $id)
	{
		$service = Service::find($id);
		$service->name     = $name;
		$service->duration = $duration;
		$service->notes    = $notes;
		$service->save();

		return $service;
	}

	/**
	 * Edits an existing service and returns the service Object.
	 * @return [type] [description]
	 */
	public function destroyService($id)
	{
		$service = Service::find($id);

		$service->delete();

		return 'happy days';
	}

	/**
	 * Creates a relation between a specific Advisor and a specific Service
	 *
	 * @var array
	 */
	public function connectService($services, $advisor_id)
	{
		foreach ($services as $service_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->services()->attach($service_id);
		}

		return $services;
	}

	/**
	 * Removes the relation between a specific Advisor and a specific Service
	 *
	 * @var array
	 */
	public function disconnectService($services, $advisor_id)
	{
		foreach ($services as $service_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->services()->detach($service_id);
		}

		return $services;
	}

	/**
	 * Creates a relation between a specific Advisor and a specific Location
	 *
	 * @var array
	 */
	public function connectServiceWithLocation($services, $advisor_id, $location_id)
	{

		foreach ($services as $service_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->services()->attach($service_id);

			$service = Service::find($service_id);
			$service->locationsWithAdvisor()->attach($location_id, ['advisor_id' => $advisor_id]);
		}

		return $services;
	}

	/**
	 * Returns all of the services that exist in the database which
	 * the given Advisor does offer.
	 * @var array
	 */
	public function servicesContainedByAdvisor($advisor_id, $api = null, $just_id = null)
	{
		// Get the Advisor whos services you will be fetching
		$advisor = Advisor::find($advisor_id);

		// This is to return the full JSON body of all services
		if ($api == 'api')
		{
			return $advisor->services()->get();
		}

		// This is to prevent some type of error. Don't remember what.
		if ($just_id == '1')
		{
			return $servicesContainedByAdvisor = $advisor->services()->lists('service_id');
		}

		// Grab the name, unique ID, and duration of the services.
		$servicesContainedByAdvisor = $advisor->services()->lists('name', 'service_id');

		return $servicesContainedByAdvisor;
	}

	public function justTheFirstServiceBecauseMyCodeSucks($advisor_id)
	{
		// Get the Advisor, MF
		$advisor = Advisor::find($advisor_id);

		$firstService = $advisor->services->first();

		return $firstService;
	}

	/**
	 * Returns all of the services that exist in the database which
	 * the given Advisor does not offer.
	 * @var array
	 */
	public function servicesNotContainedByAdvisor($advisor_id)
	{
		if ($this->servicesContainedByAdvisor($advisor_id) == null)
		{
			$servicesNotContainedByAdvisor = Service::lists('name', 'id');

			return $servicesNotContainedByAdvisor;
		}
		$servicesNotContainedByAdvisor =
			Service::whereNotIn('id', $this->servicesContainedByAdvisor($advisor_id, 1))
			->lists('name', 'id');

		return $servicesNotContainedByAdvisor;
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'services';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * Attributes included in the model's JSON form.
	 * @var [type]
	 */
	protected $fillable = ['name', 'notes', 'duration'];

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function advisors()
    {
        return $this->belongsToMany('\MyApp\Advisor');
    }

    /**
     * This is the location for where a specific Advisor would like to use a service.
     * NOT TIED TO AVAILABILITY.
     * @return type
     */
    public function locationsWithAdvisor()
    {
        return $this->belongsToMany('\MyApp\Location', 'service_location_advisor')->withPivot('advisor_id');
    }

    /**
     * Many-to-many relationship
     * @return type
     */
    public function availabilities()
    {
        return $this->belongsToMany('\MyApp\Availability');
    }

    /**
	 * One-to-many relationship
	 * @return [type] [description]
	 */
	public function recurringAvailabilities()
    {
        return $this->hasMany('\MyApp\RecurringAvailability');
    }

}


