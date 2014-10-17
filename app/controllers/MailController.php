<?php

use \MyApp\Advisor;

class MailController extends \BaseController {

	public function availabilityRequest()
	{
		Mail::send('emails.welcome', array('key' => 'value'), function($message)
		{
		    $message->to('hvent90@gmail.com', 'John Smith')->subject('Welcome!');
		    $message->from('test@test.com');
		});

	}
}