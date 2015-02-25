<?php namespace MyApp;

class Location extends \Eloquent {

	/**
	 * Creates a new location and returns the location Object.
	 * @return [type] [description]
	 */
	public function createLocation($name, $address, $website, $advisor_id = 0)
	{
		$location = new Location;
		$location->name       = $name;
		$location->address    = $address;
		$location->website    = $website;
		$location->advisor_id = $advisor_id;
		$location->save();

		return $location;
	}

	/**
	 * Edits an existing location and returns the location Object.
	 * @return [type] [description]
	 */
	public function editLocation($name, $address, $website, $advisor_id, $id)
	{
		$location = Location::find($id);
		$location->name       = $name;
		$location->address    = $address;
		$location->website    = $website;
		$location->advisor_id = $advisor_id;
		$location->save();

		return $location;
	}

	/**
	 * Edits an existing location and returns the location Object.
	 * @return [type] [description]
	 */
	public function destroyLocation($id)
	{
		$location = Location::find($id);

		$location->delete();

		return 'happy days';
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'locations';

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
	protected $fillable = ['name', 'address', 'website', 'company_id'];

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function meetings()
    {
        return $this->belongsToMany('\MyApp\Meeting');
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
