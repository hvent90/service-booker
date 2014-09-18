<?php

class Day extends Eloquent {

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
        return $this->belongsToMany('Meeting');
    }

}
