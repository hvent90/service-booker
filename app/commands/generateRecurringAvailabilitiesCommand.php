<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Carbon\Carbon;
use \MyApp\Availability;
use \MyApp\RecurringAvailability;
use \MyApp\Day;
use \MyApp\Advisor;
use \MyApp\Service;

class generateRecurringAvailabilitiesCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'availabilities:generate-recurring';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This will generate all recurring availabilities for two weeks.';

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
		$recurringAvailabilities = RecurringAvailability::all();
		$today = Day::where('date', Carbon::today())->first();
		$daysInNextTwoWeeks = Day::whereBetween('id', [$today->id, ((int) $today->id + 14)])->lists('date');

		$advisors = Advisor::all();

		foreach ($advisors as $advisor) {
			if ($advisor->recurringAvailabilities()->count() == 0) {
				continue;
			}
			$availabilitiesInNextTwoWeeks = [];

			foreach ($advisor->availabilities()->get() as $avail) {
				if (in_array($avail->days()->first()->date, $daysInNextTwoWeeks)) {
					if (count(explode(':', $avail->days()->first()->pivot->time)) == 1) {
						if (explode(' ', $avail->days()->first()->pivot->time)[1] == 'AM') {
							if (explode(' ', $avail->days()->first()->pivot->time)[0] == '12') {
								$time = 0;
							} else {
								$time = (int) explode(' ', $avail->days()->first()->pivot->time)[0];
							}
						} else {
							if (explode(' ', $avail->days()->first()->pivot->time)[0] == '12') {
								$time = (int) explode(' ', $avail->days()->first()->pivot->time)[0];
							} else {
								$time = (int) explode(' ', $avail->days()->first()->pivot->time)[0] + 12;
							}
						}
					} else {
						if (explode(' ', explode(':', $avail->days()->first()->pivot->time)[1])[1] == 'AM') {
							if (explode(':', $avail->days()->first()->pivot->time)[0] == '12') {
								$time = 0;
							} else {
								$time = (int) explode(':', $avail->days()->first()->pivot->time)[0];
							}
						} else {
							if (explode(':', $avail->days()->first()->pivot->time)[0] == '12') {
								$time = (int) explode(':', $avail->days()->first()->pivot->time)[0];
							} else {
								$time = (int) explode(':', $avail->days()->first()->pivot->time)[0] + 12;
							}
						}
					}

					$availabilitiesInNextTwoWeeks[] = [
						'date' => $avail->days()->first()->date,
						'time' => $time
					];
				}
			}
			$recurringAvailabilitiesInNextTwoWeeks = [];

			foreach ($advisor->recurringAvailabilities()->get() as $recurAvail) {
				$difference = $recurAvail->day_of_week - Carbon::parse($today->date)->dayOfWeek;

				$this->info($difference);

				$dayOfWeekOfRecurAvail = Day::find($today->id + $difference);
				$nextWeeksDay = Day::find($today->id + $difference + 7);
				$timeOfRecurAvail = $recurAvail->time;

				if ($this->in_array_r([$dayOfWeekOfRecurAvail->date, $recurAvail->time], $availabilitiesInNextTwoWeeks)) {
					echo 'intersection of RecurAvail ID '.$recurAvail->id.' at date '.$dayOfWeekOfRecurAvail->date."\n";
				} else {
					// Create it for this Week
					if ($difference > 0) {
						Availability::createRecurringAvailability($timeOfRecurAvail, $dayOfWeekOfRecurAvail->id, $advisor->id, Service::where('name', '25 Minute Free Consultation')->first()->id, $recurAvail->location_id);
					}

					if (!$this->in_array_r([$nextWeeksDay->date, $recurAvail->time], $availabilitiesInNextTwoWeeks)) {
						// Create it for next week
						Availability::createRecurringAvailability($timeOfRecurAvail, ((int) $dayOfWeekOfRecurAvail->id + 7), $advisor->id, Service::where('name', '25 Minute Free Consultation')->first()->id, $recurAvail->location_id);
					}
				}

			}
		}
	}

	public function in_array_r($item, $array)
	{
		foreach ($array as $key => $value) {
			if ($value['date'] == $item[0] && $value['time'] == $item[1]) {
				return true;
			}
		}

		return false;
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
