<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use \MyApp\Availability;
use \Carbon\Carbon;

class meetingReminderEmailCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'email:reminder';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Sends an email 24 hours to the advisor and advisee of the impending meeting.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$availabilities = [];

		foreach (Availability::where('reminder_sent', false)
			->where('is_booked', true)->get() as $availability) {
			$date = $availability->days()->first()->date;
			$time = $availability->days()->first()->pivot->time;
			$dt = Carbon::parse($date.' '.$availability->timeToTimeStamp($time));
			if (Carbon::now()->diffInMinutes($dt, false) > 0) {
				$availabilities[] = $availability;
			}
		}

		foreach($availabilities as $avail) {
			$this->info($avail->reminder_sent);
			$meeting = $avail->meetings()->first();
			$advisorEmail = $avail->advisors()->first()->email;
			$adviseeEmail = $avail->meetings()->first()->requestees()->first()->email;

			$advisor = $meeting->advisors()->first();
	    	$requestee = $meeting->requestees()->first();
	    	$avail = $meeting->availabilities()->first();
	    	$advisorName = $advisor->first_name.' '.$advisor->last_name;
			$advisorEmail = $advisor->email;

	    	$data = [
				'requestee_name'   => $requestee->name,
				'requestee_email'  => $requestee->email,
				'requestee_notes'  => $requestee->notes,
				'requestee_phone'  => $requestee->phone,
				'advisorName'      => $advisor->first_name.' '.$advisor->last_name,
				'locationWebsite'  => $avail->locations()->first()->website,
				'locationName'     => $avail->locations()->first()->name,
				'availabilityTime' => $avail->days()->first()->prettyPrint(). ' at ' .$availability->days()->first()->pivot->time
	    	];

	    	\Mail::queue('emails.reminder.advisor', $data, function($message) use ($advisorEmail, $advisorName) {
	    		$message->to($advisorEmail, $advisorName)
	    			->subject('Reminder: Your Office Hours meeting is tomorrow.');
	    	});
	    	$this->info($advisorEmail.' emailed.');

	    	\Mail::queue('emails.reminder.requestee', $data, function($message) use ($requestee) {
	    		$message->to($requestee->email, $requestee->name)
	    			->subject('Reminder: Your Office Hours meeting is tomorrow.');
	    	});
	    	$this->info($requestee->email.' emailed.');

	    	$avail->reminder_sent = true;
		}

		$this->info('end.');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('example', InputArgument::OPTIONAL, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
