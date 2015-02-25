<?php namespace MyApp;

use DB;
use Carbon\Carbon;

class Day extends \Eloquent  {

	/**
	 * Creates a Day object with its date set to Today.
	 * @return [type] [description]
	 */
	public static function createDay($date = null)
	{
		$newDay = new Day;

		if ($date != null)
		{
			$newDay->date = $date;
		} else {
			$newDay->date = Carbon::today();
		}
		$newDay->save();

		return $newDay;
	}

	public static function findDay($year, $month, $day)
	{
		$d = Carbon::parse($month.'/'.$day.'/'.$year);

		$day = Day::where('date', $d->toDateTimeString())->first();

		return $day;
	}

	public static function formatTime($time)
	{

		$availabilityTimes = [];

		foreach (json_decode($time) as $day)
		{
			$availabilityTimes[] = [
				'day_id' => $day->dayId,
				'time'   => $day->startHour.'-'.$day->endHour
			];
		}

		return $availabilityTimes;
	}

	/**
	 * Takes a Day and sets its date to the net empty Date.
	 * @param  Day    $day [description]
	 * @return [type]      [description]
	 */
	public static function onNextEmptyDate()
	{
		$farthestDay = Day::getFarthestOutDay();

		$fdt = Carbon::parse($farthestDay->date);

		$fdt = $fdt->addDay();

		$newDay = Day::createDay($fdt);

		return $newDay;
	}

	public function getNextDay()
	{
		$dt = Carbon::parse($this->date);

		$specificDay = $dt->day + 1;

		$daysInMonth = Day::where( DB::raw('DAY(date)'), '=', date($specificDay) )->first();

		return $daysInMonth;
	}

	/**
	 * Returns the day who's date is the farthest away
	 * @return [type] [description]
	 */
	public static function getFarthestOutDay()
	{
		$farthestDay = Day::select()->orderBy('date','desc')->first();

		return $farthestDay;
	}

	public function prettyPrint()
	{
		$dt = Carbon::parse($this->date);

		$dayOfWeek = $this->humanDayOfWeek();
		$month 	   = $this->humanMonthOfYear();
		$numerical = $this->ofMonth();
		$year  = $dt->year;

		return $dayOfWeek['full'].' '.$month['full'].' '.$numerical.', '.$year;
	}

	/**
	 * Returns a descriptive array in regards to the Day's position in the Week.
	 * @param  Day    $day [description]
	 * @return [type]      [description]
	 */
	public function humanDayOfWeek()
	{
		$dt = Carbon::parse($this->date);

		switch ($dt->dayOfWeek):
			case 0:
				return ['full' => 'Sunday',    'abv' => 'Sun',   'num' => 0];
			case 1:
				return ['full' => 'Monday',    'abv' => 'Mon',   'num' => 1];
			case 2:
				return ['full' => 'Tuesday',   'abv' => 'Tues',  'num' => 2];
			case 3:
				return ['full' => 'Wednesday', 'abv' => 'Wed',   'num' => 3];
			case 4:
				return ['full' => 'Thursday',  'abv' => 'Thurs', 'num' => 4];
			case 5:
				return ['full' => 'Friday',    'abv' => 'Fri',   'num' => 5];
			case 6:
				return ['full' => 'Saturday',  'abv' => 'Sat',   'num' => 6];
		endswitch;
	}

	//=============================================================================
	// WEEKS
	//=============================================================================

	public function weekOfYear()
	{
		$dt = Carbon::parse($this->date);

		return $dt->weekOfYear;
	}

	public function firstDayInWeek()
	{
		$dt = Carbon::parse($this->date);

		if(! $dt->dayOfWeek == Carbon::SUNDAY) {
		$firstDayFix = $dt->startOfWeek()->subDay();
		} else { $firstDayFix = $dt; }

		$day = Day::where('date', $firstDayFix)->first();

		return $day;
	}

	public function lastDayInWeek()
	{
		$dt = Carbon::parse($this->date);

		if(! $dt->dayOfWeek == Carbon::SUNDAY) {
			$lastDayFix = $dt->endOfWeek()->subDay()->startOfDay();
		} else { $lastDayFix = $dt->addDay()->endOfWeek()->subDay()->startOfDay(); }

		$day = Day::where('date', $lastDayFix)->first();

		return $day;
	}


	/**
	 * Returns the Week of the Day's Month that the Day resides in.
	 * @param  Day    $day [description]
	 * @return [type]      [description]
	 */
	public function weekOfTheMonth(Day $day)
	{
		$dt = Carbon::parse($day->date);

		return $dt->weekOfMonth;
	}

	public function groupByWeek(Day $day)
	{
		$day->getAllDaysInCurrentMonth();
		$day->segmentDaysInToWeeks();
	}


	//=============================================================================
	// MONTHS
	//=============================================================================

	public static function oneMonthViewOfDaysWithTelomeres($month, $year)
	{
		$days = Day::getAllDaysInSelectedMonth($month, $year);

		// get the first day of the month
		$firstDayInMonth = Day::getFirstDayInSelectedMonth($month, $year);

		// get the week of that day, get the first day in that week
		$firstDayInFirstWeek = $firstDayInMonth->firstDayInWeek();

		// get the last day of the month
		$lastDayInMonth = Day::getLastDayInSelectedMonth($month, $year);
		// get the week of that day, get the last day in that week
		$lastDayInLastWeek = $lastDayInMonth->lastDayInWeek();

		// get a colection of all days in between firstDayInFirstWeek & lastDayInLastWeek
		$oneMonthViewOfDaysWithTelomeres = Day::select()
			->whereBetween('id', [$firstDayInFirstWeek->id, $lastDayInLastWeek->id])
			->get();

		$monthName = Day::staticHumanMonthOfYear($month);

		$package = [
			'month' => $monthName,
			'year'  => $year,
			'collection' => $oneMonthViewOfDaysWithTelomeres
		];

		return $package;
	}

	/**
	 * Returns the Day's # in the Month.
	 * @return [type] [description]
	 */
	public function ofMonth()
	{
		$dt = Carbon::parse($this->date);

		return $dt->day;
	}

	/**
	 * Returns a descriptive array in regards to the Month's position in the Year.
	 * @param  Day    $day [description]
	 * @return [type]      [description]
	 */
	public function humanMonthOfYear()
	{
		$dt = Carbon::parse($this->date);

		switch ($dt->month):
			case 1:
				return ['full' => 'January',     'abv' => 'Jan',   'num' => 1];
			case 2:
				return ['full' => 'February',    'abv' => 'Feb',   'num' => 2];
			case 3:
				return ['full' => 'March',       'abv' => 'Mar',   'num' => 3];
			case 4:
				return ['full' => 'April',       'abv' => 'Apr',   'num' => 4];
			case 5:
				return ['full' => 'May',         'abv' => 'May',   'num' => 5];
			case 6:
				return ['full' => 'June',        'abv' => 'Jun',   'num' => 6];
			case 7:
				return ['full' => 'July',        'abv' => 'Jul',   'num' => 7];
			case 8:
				return ['full' => 'August',      'abv' => 'Aug',   'num' => 8];
			case 9:
				return ['full' => 'September',   'abv' => 'Sep',   'num' => 9];
			case 10:
				return ['full' => 'October',     'abv' => 'Oct',   'num' => 10];
			case 11:
				return ['full' => 'November',    'abv' => 'Nov',   'num' => 11];
			case 12:
				return ['full' => 'December',    'abv' => 'Dec',   'num' => 12];
		endswitch;
	}

	public static function staticHumanMonthOfYear($month)
	{
		switch ($month):
			case 1:
				return ['full' => 'January',     'abv' => 'Jan',   'num' => 1];
			case 2:
				return ['full' => 'February',    'abv' => 'Feb',   'num' => 2];
			case 3:
				return ['full' => 'March',       'abv' => 'Mar',   'num' => 3];
			case 4:
				return ['full' => 'April',       'abv' => 'Apr',   'num' => 4];
			case 5:
				return ['full' => 'May',         'abv' => 'May',   'num' => 5];
			case 6:
				return ['full' => 'June',        'abv' => 'Jun',   'num' => 6];
			case 7:
				return ['full' => 'July',        'abv' => 'Jul',   'num' => 7];
			case 8:
				return ['full' => 'August',      'abv' => 'Aug',   'num' => 8];
			case 9:
				return ['full' => 'September',   'abv' => 'Sep',   'num' => 9];
			case 10:
				return ['full' => 'October',     'abv' => 'Oct',   'num' => 10];
			case 11:
				return ['full' => 'November',    'abv' => 'Nov',   'num' => 11];
			case 12:
				return ['full' => 'December',    'abv' => 'Dec',   'num' => 12];
		endswitch;
	}


	/**
	 * Returns the amount of days in Day's Month.
	 * @param  Day    $day [description]
	 * @return [type]      [description]
	 */
	public function daysInThisMonth(Day $day)
	{
		$dt = Carbon::parse($day->date);

		return $dt->daysInMonth;
	}

	public function getFirstDayInCurrentMonth()
	{
		$dt = Carbon::parse($this->date);

		$month = $dt->month;
		$year  = $dt->year;

		$firstDayInMonth = Day::select()
			->where( DB::raw('MONTH(date)'), '=', date($month) )
			->where( DB::raw('YEAR(date)'), '=', date($year) )
			->orderBy('date', 'asc')
			->first();

		return $firstDayInMonth;
	}

	public static function getFirstDayInSelectedMonth($month, $year)
	{
		$firstDayInMonth = Day::select()
			->where( DB::raw('MONTH(date)'), '=', date($month) )
			->where( DB::raw('YEAR(date)'), '=', date($year) )
			->orderBy('date', 'asc')
			->first();

		return $firstDayInMonth;
	}

	public static function getLastDayInSelectedMonth($month, $year)
	{
		$lastDayInMonth = Day::select()
			->where( DB::raw('MONTH(date)'), '=', date($month) )
			->where( DB::raw('YEAR(date)'), '=', date($year) )
			->orderBy('date', 'desc')
			->first();

		return $lastDayInMonth;
	}

	public function getAllDaysInCurrentMonth()
	{
		$dt = Carbon::parse($this->date);

		$month = $dt->month;
		$year  = $dt->year;

		$daysInMonth =
			Day::where( DB::raw('MONTH(date)'), '=', date($month) )
			->where( DB::raw('YEAR(date)'), '=', date($year) )
			->get();

		return $daysInMonth;
	}

	public function getAllDaysInNextMonth()
	{
		$dt = Carbon::parse($this->date);

		$month = $dt->month + 1;
		$year  = $dt->year;

		$daysInMonth =
			Day::where( DB::raw('MONTH(date)'), '=', date($month) )
			->where( DB::raw('YEAR(date)'), '=', date($year) )
			->get();

		return $daysInMonth;
	}

	public function getAllDaysInPreviousMonth()
	{
		$dt = Carbon::parse($this->date);

		$month = $dt->month + 1;
		$year  = $dt->year;

		$daysInMonth =
			Day::where( DB::raw('MONTH(date)'), '=', date($month) )
			->where( DB::raw('YEAR(date)'), '=', date($year) )
			->get();

		return $daysInMonth;
	}

	public static function getAllDaysInSelectedMonth($month, $year)
	{
		$daysInMonth =
			Day::where( DB::raw('MONTH(date)'), '=', date($month) )
			->where( DB::raw('YEAR(date)'), '=', date($year) )
			->get();


		return $daysInMonth;
	}


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'days';

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
	protected $fillable = ['date'];

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function meetings()
    {
        return $this->belongsToMany('\MyApp\Meeting');
    }

    public function availabilities()
    {
        return $this->belongsToMany('\MyApp\Availability');
    }

}
