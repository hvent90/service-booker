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

        $expertiseNames = [
            'Launch',
            'Mobile',
            'MVP',
            'Product Development',
            'Product Management',
            'Startups',
            'Raising Capital',
            'Grant Management',
            'Board Management and Facilitation',
            'Tax Credits',
            'Amazon Web Services',
            'ASP.NET',
            'SharePoint',
            'MVC',
            'PHP',
            'Orchard CMS',
            'Windows Azure',
            'Wordpress'

        ];

        foreach ($expertiseNames as $name) {
            $this->expertise->createExpertise(
                $name,
                'Description goes here.'
            );
        }
    }

}