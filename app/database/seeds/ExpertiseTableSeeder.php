<?php

use \MyApp\Expertise;

class ExpertiseTableSeeder extends Seeder {

	protected $expertise;

	public function __construct(Expertise $expertise)
	{
		$this->expertise = $expertise;
	}

    public function run()
    {
        DB::table('expertise')->delete();

        $this->expertise->createExpertise(
            'Martial Arts',
            'Skilled in Kenpo.'
        );

        $this->expertise->createExpertise(
            'Software Engineering',
            'Skilled in PHP.'
        );
    }

}