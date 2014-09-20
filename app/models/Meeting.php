<?php namespace MyApp;

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
	protected $fillable = ['title', 'notes'];

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function advisors()
    {
        return $this->belongsToMany('Advisor');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function days()
    {
        return $this->belongsToMany('Day');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function locations()
    {
        return $this->belongsToMany('Location');
    }

}
