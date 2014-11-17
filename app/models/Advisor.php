<?php namespace MyApp;

use Hash, Auth;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Advisor extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * Creates a new Advisor and returns the Advisor Object.
	 * @return [type] [description]
	 */
	public function createAdvisor($first_name, $last_name, $email, $password, $bio, $permission = 1)
	{
		$advisor = new Advisor;
		$advisor->first_name  = $first_name;
		$advisor->email       = $email;
		$advisor->last_name   = $last_name;
		$advisor->password    = Hash::make($password);
		$advisor->permissions = $permission;
		$advisor->bio         = $bio;
		$advisor->save();

		$advisor->services()->attach(1);

		Auth::login($advisor);

		return $advisor;
	}

	/**
	 * Edits an existing Advisor and returns the Advisor Object.
	 * @return [type] [description]
	 */
	public function editAdvisor($first_name, $last_name, $email, $password, $id, $bio)
	{
		$advisor = Advisor::find($id);

		if ($first_name !== '') {
			$advisor->first_name = $first_name;
		}
		if ($last_name !== '') {
			$advisor->last_name  = $last_name;
		}
		if ($email !== '') {
			$advisor->email      = $email;
		}
		if ($password !== '') {
			$advisor->password   = Hash::make($password);
		}

		if ($bio !== '') {
			$advisor->bio   = $bio;
		}

		if(!$advisor->services()->first()) {
			$advisor->services()->attach(1);
		}

		$advisor->save();

		return $advisor;
	}

	/**
	 * Edits an existing Advisor and returns the Advisor Object.
	 * @return [type] [description]
	 */
	public function destroyAdvisor($id)
	{
		$advisor = Advisor::find($id);

		$advisor->delete();

		return 'happy days';
	}

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
	protected $hidden = array('password', 'remember_token', 'permissions');

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
        return $this->belongsToMany('\MyApp\Meeting');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function companies()
    {
        return $this->belongsToMany('\MyApp\Company');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function services()
    {
        return $this->belongsToMany('\MyApp\Service');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function expertise()
    {
        return $this->belongsToMany('\MyApp\Expertise');
    }

    /**
	 * Many-to-many relationship
	 * @return [type] [description]
	 */
	public function serviceAndLocation()
    {
        return $this->hasMany('\MyApp\AdvisorAndServiceAndLocation', 'advisor_service_location');
    }

    public function availabilities()
    {
        return $this->belongsToMany('\MyApp\Availability', 'availability_advisor');
    }

}
