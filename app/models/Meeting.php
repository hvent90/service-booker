<?php namespace MyApp;

use \MyApp\Day;
use \MyApp\Service;
use \MyApp\Advisor;
use \MyApp\Location;
use \MyApp\Requestee;
use \MyApp\Availability;

class Meeting extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'meetings';

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
	protected $fillable = ['title', 'notes', 'status'];

	public static function createMeetingRequest(
		$day_id,
		$service_id,
		$advisor_id,
		$location_id,
		$availability_id,
		$requestee_name,
		$requestee_email,
		$requestee_notes
	)
	{
		$requestee = Requestee::createRequestee($requestee_name, $requestee_email, $requestee_notes);

		$meeting = new Meeting;
		$meeting->status = 0;
		$meeting->title = Availability::find($availability_id)->title;
		$meeting->notes = Availability::find($availability_id)->notes;
		$meeting->save();

		$meeting->days()->attach($day_id);
		$meeting->services()->attach($service_id);
		$meeting->advisors()->attach($advisor_id);
		$meeting->locations()->attach($location_id);
		$meeting->availabilities()->attach($availability_id);
		$meeting->requestees()->attach($requestee);

		self::sendRequestInitializationEmail(
			$day_id,
			$service_id,
			$advisor_id,
			$location_id,
			$availability_id,
			$requestee_name,
			$requestee_email,
			$requestee_notes
		);

		return $meeting;
	}

	public function deleteMeeting()
	{
		$this->days()->detach();
		$this->services()->detach();
		$this->advisors()->detach();
		$this->locations()->detach();
		$this->availabilities()->detach();

		$this->delete();

		return 'happy days';
	}

	public function declineMeetingRequest()
	{
		$this->status = -1;

		$this->availabilities()->first()->unbook();

		$this->save();
	}

	public function acceptMeetingRequest()
	{
		$this->status = 1;

		$this->availabilities()->first()->book();

		$this->save();

		$this->sendAcceptMeetingRequestEmail();
	}

	public function getMeetingDateTime()
	{
		$dt = $this->days()->first();
		dd($dt);
	}

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function advisors()
    {
        return $this->belongsToMany('\MyApp\Advisor');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function days()
    {
        return $this->belongsToMany('\MyApp\Day', 'meeting_day');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function locations()
    {
        return $this->belongsToMany('\MyApp\Location', 'meeting_location');
    }

    public function availabilities()
    {
    	return $this->belongsToMany('\MyApp\Availability', 'meeting_availability');
    }

    public function services()
    {
    	return $this->belongsToMany('\MyApp\Service');
    }

    public function requestees()
    {
    	return $this->belongsToMany('\MyApp\Requestee');
    }

    public static function sendRequestInitializationEmail(
    	$day_id,
		$service_id,
		$advisor_id,
		$location_id,
		$availability_id,
		$requestee_name,
		$requestee_email,
		$requestee_notes
	)
    {
    	$data = [
    		$day_id,
			$service_id,
			$advisor_id,
			$location_id,
			$availability_id,
			$requestee_name,
			$requestee_email,
			$requestee_notes
    	];

    	\Mail::queue('emails.requests.initialize', $data, function($message)
    		use (
    			$day_id,
				$service_id,
				$advisor_id,
				$location_id,
				$availability_id,
				$requestee_name,
				$requestee_email,
				$requestee_notes
    		)
		{
		    $message->to($requestee_email, $requestee_name)
		    	->subject('Your request has been submitted!');
		});

		\Mail::queue('emails.requests.initialize', $data, function($message)
    		use (
    			$day_id,
				$service_id,
				$advisor_id,
				$location_id,
				$availability_id,
				$requestee_name,
				$requestee_email,
				$requestee_notes
    		)
		{
			$advisor = Advisor::find($advisor_id);
			$availability = Availability::find($availability_id);
		    $message->to($advisor->email, $advisor->first_name.' '.$advisor->last_name)
		    	->subject('You have been requested for "'.$availability->title.'"');
		});
    }

    public function sendAcceptMeetingRequestEmail()
    {
    	$data = [

    	];

    	$advisor = $this->advisors()->first();
    	$requestee = $this->requestees()->first();

    	\Mail::queue('emails.requests.accept', $data, function($message) use ($advisor) {
    		$message->to($advisor->email, $advisor->first_name.' '.$advisor->last_name)
    			->subject('Your meeting has been scheduled!');
    	});

    	\Mail::queue('emails.requests.accept', $data, function($message) use ($requestee) {
    		$message->to($requestee->email, $requestee->name)
    			->subject('Your request has been accepted!');
    	});
    }

}
