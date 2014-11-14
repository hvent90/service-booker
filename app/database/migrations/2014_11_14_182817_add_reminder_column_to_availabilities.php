<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReminderColumnToAvailabilities extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('availabilities', function($table)
		{
		    $table->boolean('reminder_sent');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('availabilities', function($table)
		{
		    $table->dropColumn('reminder_sent');
		});
	}

}
