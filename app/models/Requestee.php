<?php namespace MyApp;

class Requestee extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'requestees';

	public static function createRequestee($name, $email, $notes, $phone)
	{
		$requestee = new Requestee;
		$requestee->name  = $name;
		$requestee->email = $email;
		$requestee->notes = $notes;
		$requestee->phone = $phone;

		$requestee->save();

		return $requestee;
	}

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
	protected $fillable = ['name', 'email', 'notes'];
}