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
		$requestee_notes,
		$requestee_phone
	)
	{
		$requestee = Requestee::createRequestee($requestee_name, $requestee_email, $requestee_notes, $requestee_phone);

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
			$requestee_notes,
			$requestee_phone
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
		if ($this->status == 1) {
			$this->sendCancelledMeetingEmail();
		}

		$this->availabilities()->first()->unbook();

		$this->status = -1;

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
		$requestee_notes,
		$requestee_phone
	)
    {
    	$advisor = Advisor::find($advisor_id);
		$availability = Availability::find($availability_id);
		$advisorName = $advisor->first_name.' '.$advisor->last_name;
		$advisorEmail = $advisor->email;

    	$data = [
    		'day_id'           => $day_id,
			'service_id'       => $service_id,
			'advisor_id'       => $advisor_id,
			'location_id'      => $location_id,
			'availabilitiy_id' => $availability_id,
			'requestee_name'   => $requestee_name,
			'requestee_email'  => $requestee_email,
			'requestee_notes'  => $requestee_notes,
			'requestee_phone'  => $requestee_phone,
			'advisor'          => $advisor,
			'advisorName'      => $advisor->first_name.' '.$advisor->last_name,
			'locationWebsite'  => $availability->locations()->first()->website,
			'locationName'     => $availability->locations()->first()->name,
			'availability'     => $availability,
			'availabilityTime' => $availability->days()->first()->prettyPrint(). ' at ' .$availability->days()->first()->pivot->time
    	];

    	\Mail::queue('emails.requests.requestee', $data, function($message)
    		use (
    			$day_id,
				$service_id,
				$advisor_id,
				$location_id,
				$availability_id,
				$requestee_name,
				$requestee_email,
				$requestee_notes,
				$requestee_phone
    		)
		{
		    $message->to($requestee_email, $requestee_name)
		    	->subject('Your request has been submitted!');
		});

		\Mail::queue('emails.requests.advisor', $data, function($message)
    		use (
    			$day_id,
				$service_id,
				$advisor_id,
				$location_id,
				$availability_id,
				$requestee_name,
				$requestee_email,
				$requestee_notes,
				$requestee_phone,
				$advisorName,
				$advisorEmail
    		)
		{
		    $message->to($advisorEmail, $advisorName)
		    	->subject('You have been requested for an availability!');
		});
    }

    public function sendAcceptMeetingRequestEmail()
    {
    	$advisor = $this->advisors()->first();
    	$requestee = $this->requestees()->first();
    	$availability = $this->availabilities()->first();
    	$advisorName = $advisor->first_name.' '.$advisor->last_name;
		$advisorEmail = $advisor->email;

    	$data = [
			'requestee_name'   => $requestee->name,
			'requestee_email'  => $requestee->email,
			'requestee_notes'  => $requestee->notes,
			'requestee_phone'  => $requestee->phone,
			'advisorName'      => $advisor->first_name.' '.$advisor->last_name,
			'locationWebsite'  => $availability->locations()->first()->website,
			'locationName'     => $availability->locations()->first()->name,
			'availabilityTime' => $availability->days()->first()->prettyPrint(). ' at ' .$availability->days()->first()->pivot->time
    	];


    	\Mail::queue('emails.booked.advisor', $data, function($message) use ($advisorEmail, $advisorName) {
    		$message->to($advisorEmail, $advisorName)
    			->subject('Your meeting has been scheduled!');
    	});

    	\Mail::queue('emails.booked.requestee', $data, function($message) use ($requestee) {
    		$message->to($requestee->email, $requestee->name)
    			->subject('Your request has been accepted!');
    	});
    }

    public function sendCancelledMeetingEmail()
    {
    	$advisor = $this->advisors()->first();
    	$requestee = $this->requestees()->first();
    	$availability = $this->availabilities()->first();
    	$advisorName = $advisor->first_name.' '.$advisor->last_name;
		$advisorEmail = $advisor->email;

    	$data = [
			'requestee_name'   => $requestee->name,
			'requestee_email'  => $requestee->email,
			'requestee_notes'  => $requestee->notes,
			'requestee_phone'  => $requestee->phone,
			'advisorName'      => $advisor->first_name.' '.$advisor->last_name,
			'locationWebsite'  => $availability->locations()->first()->website,
			'locationName'     => $availability->locations()->first()->name,
			'availabilityTime' => $availability->days()->first()->prettyPrint(). ' at ' .$availability->days()->first()->pivot->time
    	];

    	\Mail::queue('emails.cancelled.advisor', $data, function($message) use ($advisorEmail, $advisorName) {
    		$message->to($advisorEmail, $advisorName)
    			->subject('Your meeting has been cancelled!');
    	});

    	\Mail::queue('emails.cancelled.requestee', $data, function($message) use ($requestee) {
    		$message->to($requestee->email, $requestee->name)
    			->subject('Your meeting has been cancelled!');
    	});
    }

}
