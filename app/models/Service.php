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

	public function connectService($services, $advisor_id)
	{
		foreach ($services as $service_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->services()->attach($service_id);
		}

		return $services;
	}

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

	public function disconnectService($services, $advisor_id)
	{
		foreach ($services as $service_id)
		{
			$advisor = Advisor::find($advisor_id);
			$advisor->services()->detach($service_id);
		}

		return $services;
	}

	public function servicesContainedByAdvisor($advisor_id, $just_id = null)
	{
		$advisor = Advisor::find($advisor_id);
		if ($just_id == '1')
		{
			return $servicesContainedByAdvisor = $advisor->services()->lists('service_id');
		}

		$servicesContainedByAdvisor = $advisor->services()->lists('name', 'service_id');

		return $servicesContainedByAdvisor;
	}

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

    public function locationsWithAdvisor()
    {
        return $this->belongsToMany('\MyApp\Location', 'service_location_advisor')->withPivot('advisor_id');
    }

    public function availabilities()
    {
        return $this->belongsToMany('\MyApp\Availability');
    }

}


