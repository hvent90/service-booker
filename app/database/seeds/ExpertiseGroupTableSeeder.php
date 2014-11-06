<?php

use \MyApp\Expertise;
use \MyApp\ExpertiseGroup;

class ExpertiseGroupTableSeeder extends Seeder {

	protected $expertise;
    protected $expertiseGroup;

	public function __construct(Expertise $expertise, ExpertiseGroup $expertiseGroup)
	{
		$this->expertise      = $expertise;
        $this->expertiseGroup = $expertiseGroup;
	}

    public function run()
    {
        DB::table('expertisegroups')->delete();

        $expertiseGroupNames = [
            'Government',
            'Law',
            'Real Estate',
            'Technical Development',
            'Management',
            'Financial',
            'Startups',
            'Marketing',
            'Health'
        ];

        foreach ($expertiseGroupNames as $groupName) {
            $this->expertiseGroup->createExpertiseGroup(
                $groupName,
                'Description goes here.'
            );
        }
    }

}