<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecurringAvailabilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recurring_availabilities', function($table)
		{
		    $table->increments('id');
		    $table->integer('advisor_id');
		    $table->integer('service_id');
		    $table->integer('location_id');
		    $table->integer('time');
		    $table->integer('day_of_week');
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('recurring_availabilities');
	}

}
