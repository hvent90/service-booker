<?php namespace MyApp;

use \MyApp\Advisor;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;

use Carbon\Carbon;

class Availability extends \Eloquent {

	public function createAvailability($title, $notes, $services_id, $days_id, $locations_id, $advisor_id)
	{
		$availability = new Availability;
		$availability->title = $title;
		$availability->notes = $notes;
		$availability->save();

		$availability->locations()->attach($locations_id);
		$availability->services()->attach($services_id);
		$availability->advisors()->attach($advisor_id);
		$availability->days()->attach($days_id);

		return $availability;
	}

	public function createRecurringAvailability()
	{
		// to do...
	}

	/**
	 * Destroys an existing Availability and returns a pleasant string.
	 * @return [type] [description]
	 */
	public function destroyAvailability($id)
	{
		$availability = Availability::find($id);

		$availability->delete();

		return 'happy days';
	}


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'availabilities';

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
	protected $fillable = ['title', 'notes'];

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function advisors()
    {
        return $this->belongsToMany('\MyApp\Advisor', 'availability_advisor');
    }

    public function services()
    {
        return $this->belongsToMany('\MyApp\Service');
    }

    public function locations()
    {
        return $this->belongsToMany('\MyApp\Location');
    }

    public function days()
    {
        return $this->belongsToMany('\MyApp\Day');
    }

}
