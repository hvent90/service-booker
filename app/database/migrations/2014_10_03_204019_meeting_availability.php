<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MeetingAvailability extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meeting_availability', function($table)
		{
		    $table->increments('id');
		    $table->integer('meeting_id');
		    $table->integer('availability_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meeting_availability');
	}

}
