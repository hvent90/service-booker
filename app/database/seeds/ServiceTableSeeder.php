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
            '25 Minute Free Consultation',
            '',
           25
        );
    }

}