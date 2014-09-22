<?php

use \MyApp\Service;

class ServiceTableSeeder extends Seeder {

	protected $service;

	public function __construct(Service $service)
	{
		$this->service = $service;
	}

    public function run()
    {
        DB::table('services')->delete();

        $this->service->createService(
            'Kenpo Karate class',
            'Intermediate high endurance session.',
            60
        );

        $this->service->createService(
            'Polymorphism Tutorial',
            'Class for beginners and pros alike.',
            120
        );
    }

}