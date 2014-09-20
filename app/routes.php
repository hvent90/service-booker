<?php

use \MyApp\Day;
use Carbon\Carbon;

Route::get('/', [
	'as'   => 'home',
	'uses' => 'PagesController@home'
]);

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
	Route::put('edit{id}', [
		'as'   => 'advisors.update',
		'uses' => 'AdvisorController@update'
	]);

	// Show an existing Advisor
	Route::get('{id}', [
		'as'   => 'advisors.show',
		'uses' => 'AdvisorController@show'
	]);

	// Delete an existing Advisor
	Route::delete('{id}', [
		'as'   => 'advisors.destroy',
		'uses' => 'AdvisorController@destroy'
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
	Route::put('edit{id}', [
		'as'   => 'locations.update',
		'uses' => 'LocationController@update'
	]);

	// Show an existing Location
	Route::get('{id}', [
		'as'   => 'locations.show',
		'uses' => 'LocationController@show'
	]);

	// Delete an existing Location
	Route::delete('{id}', [
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
	    Route::get('new', 'App\Controllers\Api\DayAPIController@createDay');

	    /**
		 * Creates a new Day set to the next Empty Date
		 */
	    Route::get('new', 'App\Controllers\Api\DayAPIController@createNextEmptyDay');
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