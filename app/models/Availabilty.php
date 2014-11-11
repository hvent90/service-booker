<?php namespace MyApp;

use \MyApp\Advisor;
use \MyApp\Day;
use \MyApp\Expertise;
use \MyApp\Location;
use \MyApp\Service;

use Carbon\Carbon;

class Availability extends \Eloquent {

	public function OLDcreateAvailability($title, $notes, $services_id, $locations_id, $advisor_id, $dateAndTimes)
	{
		foreach ($dateAndTimes as $dateAndTime)
		{
			$availability = new Availability;
			$availability->title = $title;
			$availability->notes = $notes;
			$availability->save();

			$availability->locations()->attach($locations_id);
			$availability->services()->attach($services_id);
			$availability->advisors()->attach($advisor_id);
			$availability->days()->attach($dateAndTime['day_id'], ['time' => $dateAndTime['time']]);
		}

		return $availability;
	}

	public function createAvailability($data, $day_id, $advisor_id, $service_id)
	{
		$times = [$data[0], $data[0].':30'];

		foreach ($times as $time) {
			$availability = new Availability;
			$availability->save();

			switch ($data[2]) {
				case ('wsl'):
					$data[2] = Location::where('name', 'Walnut St. Labs')->first()->id;
					break;
				case ('ice'):
					$data[2] = Location::where('name', 'ICE')->first()->id;
					break;
				case ('evolve'):
					$data[2] = Location::where('name', 'Evolve IP')->first()->id;
					break;
			}

			$availability->locations()->attach($data[2]);
			$availability->advisors()->attach($advisor_id);
			$availability->services()->attach($service_id);
			$availability->days()->attach($day_id, ['time' => $time.' '.$data[1]]);
		}

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

		$availability->advisors()->detach();
		$availability->days()->detach();
		$availability->locations()->detach();
		$availability->services()->detach();

		$availability->delete();

		return 'happy days';
	}

	public function book()
	{
		$this->is_booked = true;

		$this->save();
	}

	public function unbook()
	{
		$this->is_booked = false;

		$this->save();
	}

	public function hasRequests()
	{
		$meetings = $this->meetings()->where('status', '!=', -1)->get();
		if ($meetings->first() == null) {
			return false;
		} else {
			return true;
		}
	}

	public function isBooked()
	{
		$meetings = $this->meetings()->get();

		foreach ($meetings as $meeting) {
			if ($meeting->status == 1)
				return $meeting;
		}

		return false;
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
        return $this->belongsToMany('\MyApp\Day')->withPivot('time');
    }

    public function meetings()
    {
    	return $this->belongsToMany('\MyApp\Meeting', 'meeting_availability', 'availability_id', 'meeting_id');
    }

}
