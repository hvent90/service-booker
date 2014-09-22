<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceLocationAdvisor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_location_advisor', function($table)
		{
		    $table->increments('id');
		    $table->integer('service_id');
		    $table->integer('location_id');
		    $table->integer('advisor_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_location_advisor');
	}

}
