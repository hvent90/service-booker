<?php

use \MyApp\Advisor;

class AdvisorTableSeeder extends Seeder {

	protected $advisor;

	public function __construct(Advisor $advisor)
	{
		$this->advisor = $advisor;
	}

    public function run()
    {
        DB::table('advisors')->delete();

        $this->advisor->createAdvisor(
            'Barry',
            'White',
            'my@email.com',
            'password'
        );
    }

}