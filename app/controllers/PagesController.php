<?php

use \MyApp\Advisor;

class PagesController extends \BaseController {

	protected $advisor;

	public function __construct(Advisor $advisor)
	{
		$this->advisor = $advisor;
	}

	public function home()
	{
		return View::make('layouts.default');
	}

}
