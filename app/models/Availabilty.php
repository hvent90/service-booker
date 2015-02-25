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
				case ('nextfab'):
					$data[2] = Location::where('name', 'NextFab')->first()->id;
					break;
				case ('remote'):
					$data[2] = Location::where('name', 'Remote')->first()->id;
					break;
			}

			$availability->locations()->attach($data[2]);
			$availability->advisors()->attach($advisor_id);
			$availability->services()->attach($service_id);
			$availability->days()->attach($day_id, ['time' => $time.' '.$data[1]]);
		}

	}

	// idgaf
	public static function createRecurringAvailability($hour, $day_id, $advisor_id, $service_id, $location_id)
	{
		$times = [];

		if ($hour > 11) {
			if ($hour > 12) {
				$hour = (int) $hour - 12;
				$times = [(string) $hour.' PM', (string) $hour.':30 PM'];
			} else {
				$times = [(string) $hour.' PM', (string) $hour.':30 PM'];
			}
		} else {
			$times = [(string) $hour.' AM', (string) $hour.':30 AM'];
		}

		foreach ($times as $time) {
			$availability = new Availability;
			$availability->save();

			$availability->locations()->attach($location_id);
			$availability->advisors()->attach($advisor_id);
			$availability->services()->attach($service_id);
			$availability->days()->attach($day_id, ['time' => $time]);
		}

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

	public function scrubExpiredAvailabilities()
	{
		$expiredAvailabilities = [];

		foreach (Availability::all() as $availability) {
			if($availability->days()->first() == null) {
				continue;
			}
			//$time = $availability->days()->first()->pivot->date;
			$time = $availability->days()->first()->pivot->time;
			$date = $availability->days()->first()['date'];
			$dt = Carbon::parse($date.' '.$availability->timeToTimeStamp($time));

			if (Carbon::now()->diffInMinutes($dt, false) < 0) {
				$expiredAvailabilities[] = $availability;
			}
		}

		foreach ($expiredAvailabilities as $expAvail) {
			$expAvail->expired = 1;
			$expAvail->save();
		}

	}

	public function timeToTimeStamp($time)
	{
		switch ($time) {
			case '12 AM':
				return '00:00';
			case '1 AM':
				return '01:00';
			case '2 AM':
				return '02:00';
			case '3 AM':
				return '03:00';
			case '4 AM':
				return '04:00';
			case '5 AM':
				return '05:00';
			case '6 AM':
				return '06:00';
			case '7 AM':
				return '07:00';
			case '8 AM':
				return '08:00';
			case '9 AM':
				return '09:00';
			case '10 AM':
				return '10:00';
			case '11 AM':
				return '11:00';
			case '12 PM':
				return '12:00';
			case '1 PM':
				return '13:00';
			case '2 PM':
				return '14:00';
			case '3 PM':
				return '15:00';
			case '4 PM':
				return '16:00';
			case '5 PM':
				return '17:00';
			case '6 PM':
				return '18:00';
			case '7 PM':
				return '19:00';
			case '8 PM':
				return '20:00';
			case '9 PM':
				return '21:00';
			case '10 PM':
				return '22:00';
			case '11 PM':
				return '23:00';
			case '12:30 AM':
				return '00:30';
			case '1:30 AM':
				return '01:30';
			case '2:30 AM':
				return '02:30';
			case '3:30 AM':
				return '03:30';
			case '4:30 AM':
				return '04:30';
			case '5:30 AM':
				return '05:30';
			case '6:30 AM':
				return '06:30';
			case '7:30 AM':
				return '07:30';
			case '8:30 AM':
				return '08:30';
			case '9:30 AM':
				return '09:30';
			case '10:30 AM':
				return '10:30';
			case '11:30 AM':
				return '11:30';
			case '12:30 PM':
				return '12:30';
			case '1:30 PM':
				return '13:30';
			case '2:30 PM':
				return '14:30';
			case '3:30 PM':
				return '15:30';
			case '4:30 PM':
				return '16:30';
			case '5:30 PM':
				return '17:30';
			case '6:30 PM':
				return '18:30';
			case '7:30 PM':
				return '19:30';
			case '8:30 PM':
				return '20:30';
			case '9:30 PM':
				return '21:30';
			case '10:30 PM':
				return '22:30';
			case '11:30 PM':
				return '23:30';
		}
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
