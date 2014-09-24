<?php

use \MyApp\Day;
use Carbon\Carbon;

Route::get('/', [
	'as'   => 'home',
	'uses' => 'PagesController@home'
]);

//=============================================================================
// USER EXPERIENCE
//=============================================================================

	//=========================================================================
	// DASHBOARD
	//=========================================================================


	Route::get('dashboard', [
		'as'   => 'dashboard.index',
		'uses' => 'App\Controllers\User\DashboardController@index'
	]);

	Route::group(['prefix' => 'dashboard'], function() {
		//=====================================================================
		// EXPERTISE
		//=====================================================================
		// User goes selection-page for choosing an Expertise to connect to.
		Route::get('expertise/connect', [
			'as'   => 'user.expertise.connect',
			'uses' => 'App\Controllers\User\UserExpertiseController@connect'
		]);

		// User Stores the chosen Existing Expertise
		Route::post('expertise/connect', [
			'as'   => 'user.expertise.store',
			'uses' => 'App\Controllers\User\UserExpertiseController@store'
		]);

		// User Destroys the chosen Existing Expertise
		Route::delete('expertise/connect', [
			'as'   => 'user.expertise.destroy',
			'uses' => 'App\Controllers\User\UserExpertiseController@destroy'
		]);

		//=====================================================================
		// SERVICE
		//=====================================================================
		// User goes selection-page for choosing an Service to connect to.
		Route::get('services/connect', [
			'as'   => 'user.services.connect',
			'uses' => 'App\Controllers\User\UserServiceController@connect'
		]);

		// User Stores the chosen Existing Service
		Route::post('services/connect', [
			'as'   => 'user.services.store',
			'uses' => 'App\Controllers\User\UserServiceController@store'
		]);

		// User Destroys the chosen Existing Service
		Route::delete('services/connect', [
			'as'   => 'user.services.destroy',
			'uses' => 'App\Controllers\User\UserServiceController@destroy'
		]);

		// //=====================================================================
		// // LOCATION
		// //=====================================================================
		// // User goes selection-page for choosing an Location to connect to.
		// Route::get('locations/connect', [
		// 	'as'   => 'user.locations.connect',
		// 	'uses' => 'App\Controllers\User\UserLocationsController@connect'
		// ]);

		// // User Stores the chosen Existing Location
		// Route::post('locations/connect', [
		// 	'as'   => 'user.locations.store',
		// 	'uses' => 'App\Controllers\User\UserLocationsController@store'
		// ]);

		// // User Destroys the chosen Existing Location
		// Route::delete('locations/connect', [
		// 	'as'   => 'user.locations.destroy',
		// 	'uses' => 'App\Controllers\User\UserLocationsController@destroy'
		// ]);

		//=====================================================================
		// AVAILABILITIES
		//=====================================================================
		// User goes selection-page for choosing an Availability.
		Route::get('availabilities/create', [
			'as'   => 'user.availabilities.create',
			'uses' => 'App\Controllers\User\UserAvailabilityController@create'
		]);

		// User Stores the chosen Availability.
		Route::post('availabilities/create', [
			'as'   => 'user.availabilities.store',
			'uses' => 'App\Controllers\User\UserAvailabilityController@store'
		]);

		// User Destroys the chosen Availability.
		Route::delete('availabilities/create', [
			'as'   => 'user.availabilities.destroy',
			'uses' => 'App\Controllers\User\UserAvailabilityController@destroy'
		]);
	});

//=============================================================================
// ADVISORS
//=============================================================================

// Authenticate an Advisor
Route::post('login', [
	'as'   => 'advisors.login',
	'uses' => 'AdvisorController@logIn'
]);
// Logout an Advisor
Route::get('logout', [
	'as'   => 'advisors.logout',
	'uses' => 'AdvisorController@logOut'
]);

// Index listing of all Advisors
Route::get('advisors', [
	'as'   => 'advisors.index',
	'uses' => 'AdvisorController@index'
]);

Route::group(['prefix' => 'advisors'], function() {
	// Create a new Advisor
	Route::get('new', [
		'as'   => 'advisors.create',
		'uses' => 'AdvisorController@create'
	]);
	Route::post('new', [
		'as'   => 'advisors.store',
		'uses' => 'AdvisorController@store'
	]);

	// Update an existing Advisor
	Route::get('edit/{id}', [
		'as'   => 'advisors.edit',
		'uses' => 'AdvisorController@edit'
	]);
	Route::post('edit/{id}', [
		'as'   => 'advisors.update',
		'uses' => 'AdvisorController@update'
	]);

	// Show an existing Advisor
	Route::get('{id}', [
		'as'   => 'advisors.show',
		'uses' => 'AdvisorController@show'
	]);

	// Delete an existing Advisor
	Route::get('destroy/{id}', [
		'as'   => 'advisors.destroy',
		'uses' => 'AdvisorController@destroy'
	]);
});


//=============================================================================
// EXPERTISE
//=============================================================================

Route::get('expertise', [
	'as'   => 'expertise.index',
	'uses' => 'ExpertiseController@index'
]);

Route::group(['prefix' => 'expertise'], function() {
	// Create a new Expertise
	Route::get('new', [
		'as'   => 'expertise.create',
		'uses' => 'ExpertiseController@create'
	]);
	Route::post('new', [
		'as'   => 'expertise.store',
		'uses' => 'ExpertiseController@store'
	]);

	// Update an existing Expertise
	Route::get('edit/{id}', [
		'as'   => 'expertise.edit',
		'uses' => 'ExpertiseController@edit'
	]);
	Route::post('edit/{id}', [
		'as'   => 'expertise.update',
		'uses' => 'ExpertiseController@update'
	]);

	// Show an existing Expertise
	Route::get('{id}', [
		'as'   => 'expertise.show',
		'uses' => 'ExpertiseController@show'
	]);

	// Delete an existing Expertise
	Route::get('{id}', [
		'as'   => 'expertise.destroy',
		'uses' => 'ExpertiseController@destroy'
	]);
});


//=============================================================================
// SERVICES
//=============================================================================

Route::get('services', [
	'as'   => 'services.index',
	'uses' => 'ServiceController@index'
]);

Route::group(['prefix' => 'services'], function() {
	// Create a new Service
	Route::get('new', [
		'as'   => 'services.create',
		'uses' => 'ServiceController@create'
	]);
	Route::post('new', [
		'as'   => 'services.store',
		'uses' => 'ServiceController@store'
	]);

	// Update an existing Service
	Route::get('edit/{id}', [
		'as'   => 'services.edit',
		'uses' => 'ServiceController@edit'
	]);
	Route::post('edit/{id}', [
		'as'   => 'services.update',
		'uses' => 'ServiceController@update'
	]);

	// Show an existing Service
	Route::get('{id}', [
		'as'   => 'services.show',
		'uses' => 'ServiceController@show'
	]);

	// Delete an existing Service
	Route::get('{id}', [
		'as'   => 'services.destroy',
		'uses' => 'ServiceController@destroy'
	]);
});


//=============================================================================
// LOCATIONS
//=============================================================================

Route::get('locations', [
	'as'   => 'locations.index',
	'uses' => 'LocationController@index'
]);

Route::group(['prefix' => 'locations'], function() {
	// Create a new Location
	Route::get('new', [
		'as'   => 'locations.create',
		'uses' => 'LocationController@create'
	]);
	Route::post('new', [
		'as'   => 'locations.store',
		'uses' => 'LocationController@store'
	]);

	// Update an existing Location
	Route::get('edit/{id}', [
		'as'   => 'locations.edit',
		'uses' => 'LocationController@edit'
	]);
	Route::post('edit/{id}', [
		'as'   => 'locations.update',
		'uses' => 'LocationController@update'
	]);

	// Show an existing Location
	Route::get('{id}', [
		'as'   => 'locations.show',
		'uses' => 'LocationController@show'
	]);

	// Delete an existing Location
	Route::get('{id}', [
		'as'   => 'locations.destroy',
		'uses' => 'LocationController@destroy'
	]);
});

//=============================================================================
// DAYS
//=============================================================================

Route::get('{year}/{month}', [
	'as' => 'calendar.month',
	'uses' => 'DayController@indexMonth'
]);


//=============================================================================
// API
//=============================================================================


Route::group(array('prefix' => 'api'), function()
{

	//==========================================
	// DAYS
	//==========================================

	/**
	 * Returns all Days
	 */
    Route::get('days', 'App\Controllers\Api\DayAPIController@getAll');

    Route::group(['prefix' => 'days'], function()
    {
    	/**
		 * Creates a new Day set to Today
		 */
		Route::get('{year}/{month}', [
			'as' => 'api.calendar.month',
			'uses' => 'App\Controllers\Api\DayAPIController@getCalendarMonthViewOfYearAndMonth'
		]);

    });

    //==========================================
	// ADVISORS
	//==========================================

	/**
	 * Returns all Advisors
	 */
    Route::get('advisors', function()
    {
        //
    });

    Route::group(['prefix' => 'advisors'], function()
    {
    	/**
		 * Creates a new Advisor
		 */
	    Route::get('new', '');
    });


    //==========================================
	// COMPANIES
	//==========================================

	/**
	 * Returns all Companies
	 */
    Route::get('companies', function()
    {
        //
    });

    Route::group(['prefix' => 'companies'], function()
    {
    	/**
		 * Creates a new Company
		 */
	    Route::get('new', '');
    });

    //==========================================
	// Expertise
	//==========================================

	/**
	 * Returns all Expertise
	 */
    Route::get('expertise', function()
    {
        //
    });

    Route::group(['prefix' => 'expertise'], function()
    {
    	/**
		 * Creates a new Expertise
		 */
	    Route::get('new', '');
    });


    //==========================================
	// LOCATION
	//==========================================

	/**
	 * Returns all Locations
	 */
    Route::get('locations', function()
    {
        //
    });

    Route::group(['prefix' => 'locations'], function()
    {
    	/**
		 * Creates a new Location
		 */
	    Route::get('new', '');
    });


    //==========================================
	// SERVICES
	//==========================================

	/**
	 * Returns all Services
	 */
    Route::get('services', function()
    {
        //
    });

    Route::group(['prefix' => 'services'], function()
    {
    	/**
		 * Creates a new Service
		 */
	    Route::get('new', '');
    });

});