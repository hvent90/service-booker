<?php namespace MyApp;

class RecurringAvailability extends \Eloquent {
	
	protected $table = 'recurring_availabilities';

    protected $guarded = ['id'];

    protected $fillable = [
        'advisor_id',
        'service_id',
        'location_id',
        'day_of_week',
        'time'
    ];

    public function humanDay()
    {
        switch ($this->day_of_week) {
            case 0:
                return 'Sunday';
            case 1:
                return 'Monday';
            case 2:
                return 'Tuesday';
            case 3:
                return 'Wednesday';
            case 4:
                return 'Thursday';
            case 5:
                return 'Friday';
            case 6:
                return 'Saturday';
        }
    }

    public function humanTime()
    {
        if ($this->time < 12 && $this->time !== 0) {
            return $this->time.' A.M.';
        } else if ($this->time == 12) {
            return $this->time.' P.M.';
        } else if ($this->time == 0) {
            return '12 A.M.';
        } else {
            return ($this->time - 12).' P.M.';
        }
    }
	
	/**
	 * One-to-many relationship
	 * @return [type] [description]
	 */
	public function advisor()
    {
        return $this->belongsTo('\MyApp\Advisor');
    }

    /**
	 * One-to-many relationship
	 * @return [type] [description]
	 */
	public function location()
    {
        return $this->belongsTo('\MyApp\Location');
    }

    /**
	 * One-to-many relationship
	 * @return [type] [description]
	 */
	public function service()
    {
        return $this->belongsTo('\MyApp\Service');
    }
}
