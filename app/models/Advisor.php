<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Advisor extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'advisors';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Attributes that are included in the model's JSON form.
	 * @var [type]
	 */
	protected $fillable = ['name', 'email', 'company_id'];

	/**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function meetings()
    {
        return $this->belongsToMany('Meeting');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function companies()
    {
        return $this->belongsToMany('Company');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function services()
    {
        return $this->belongsToMany('Service');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function expertise()
    {
        return $this->belongsToMany('Expertise');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function serviceAndLocation()
    {
        return $this->belongsToMany('Service', 'advisor_service_location')->withPivot('location_id');
    }

}
