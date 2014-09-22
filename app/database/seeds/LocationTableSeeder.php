<?php

use \MyApp\Location;

class LocationTableSeeder extends Seeder {

	protected $expertise;

	public function __construct(Location $location)
	{
		$this->location = $location;
	}

    public function run()
    {
        DB::table('locations')->delete();

        $this->location->createLocation(
            'Walnut St. Labs',
            '23 North Walnut St.',
            'http://walnutstlabs.com'
        );

        $this->location->createLocation(
            "Buddy's Burgers",
            '10 W. Gay St.',
            'http://buddysburgers.com'
        );
    }

}