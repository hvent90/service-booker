<?php

use \MyApp\Day;
use Carbon\Carbon;

Route::get('/', [
	'as'   => 'home',
	'uses' => 'PagesController@home'
]);

Route::post('mail', [
	'as'   => 'mail.test',
	'uses' => 'MailController@availabilityRequest'
]);

//==========================================
// Expertise Groups
//==========================================

/**
 * Returns all specific Expertise
 */
Route::get('expertise-groups/{id}', [
	'as'   => 'api.expertise-groups.homepage',
	'uses' => 'App\Controllers\Api\ExpertiseGroupAPIController@getExpertiseGroup'
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
		Route::post('availabilities/destroy', [
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

	// Connect to Groups
	Route::get('{id}/groups', [
		'as'   => 'expertise.group-connect-and-disconnect',
		'uses' => 'ExpertiseController@connect'
	]);

	Route::post('{id}/groups', [
		'as'   => 'expertise.group-connect',
		'uses' => 'ExpertiseController@connectToExpertiseGroup'
	]);

	Route::delete('{id}/groups', [
		'as'   => 'expertise.group-disconnect',
		'uses' => 'ExpertiseController@disconnectToExpertiseGroup'
	]);
});

//=============================================================================
// EXPERTISE GROUP
//=============================================================================

Route::get('expertise-group', [
	'as'   => 'expertise-groups.index',
	'uses' => 'ExpertiseGroupController@index'
]);

Route::group(['prefix' => 'expertise-group'], function() {
	// Create a new Expertise Group
	Route::get('new', [
		'as'   => 'expertise-groups.create',
		'uses' => 'ExpertiseGroupController@create'
	]);
	Route::post('new', [
		'as'   => 'expertise-groups.store',
		'uses' => 'ExpertiseGroupController@store'
	]);

	// Update an existing Expertise Group
	Route::get('edit/{id}', [
		'as'   => 'expertise-groups.edit',
		'uses' => 'ExpertiseGroupController@edit'
	]);
	Route::post('edit/{id}', [
		'as'   => 'expertise-groups.update',
		'uses' => 'ExpertiseGroupController@update'
	]);

	// Show an existing Expertise Group
	Route::get('{id}', [
		'as'   => 'expertise-groups.show',
		'uses' => 'ExpertiseGroupController@show'
	]);

	// Delete an existing Expertise Group
	Route::get('{id}', [
		'as'   => 'expertise-groups.destroy',
		'uses' => 'ExpertiseGroupController@destroy'
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
// AVAILABILITIES
//=============================================================================

Route::get('availabilities', [
	'as'   => 'availabilities.index',
	'uses' => 'AvailabilityController@index'
]);

//=============================================================================
// MEETINGS
//=============================================================================

Route::group(['prefix' => 'meetings'], function() {
	Route::post('/', [
		'as'   => 'meetings.request.create',
		'uses' => 'MeetingController@storeRequest'
	]);

	Route::post('accept', [
		'as'   => 'meetings.request.accept',
		'uses' => 'MeetingController@acceptRequest'
	]);
	Route::post('reject', [
		'as'   => 'meetings.request.reject',
		'uses' => 'MeetingController@rejectRequest'
	]);
});
Route::group(['prefix' => 'api'], function() {
	//==========================================
	// Advisors
	//==========================================
	Route::group(['prefix' => 'advisors'], function() {
		Route::get('expertise', [
			'as'   => 'api.advisors.by-expertise',
			'uses' => 'App\Controllers\Api\AdvisorAPIController@getAdvisorsWhoHaveAvailabilitiesWithGivenExpertise'
		]);
	});
});


//=============================================================================
// DAYS
//=============================================================================

Route::get('{year}/{month}', [
	'as'   => 'calendar.month',
	'uses' => 'DayController@indexMonth'
]);

Route::get('{year}/{month}/{day}', [
	'as'   => 'calendar.day',
	'uses' => 'DayController@indexDay'
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
		 * Enter the Advisor's ID and you shall receive its JSON.
		 */
	    Route::get('{id}', 'App\Controllers\Api\AdvisorAPIController@getAdvisor');

	    /**
	     * Enter the Advisor's ID and you shall recieve the JSON of all of its Services.
	     */
	    Route::get('{id}/services', 'App\Controllers\Api\AdvisorAPIController@getServicesByAdvisor');
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