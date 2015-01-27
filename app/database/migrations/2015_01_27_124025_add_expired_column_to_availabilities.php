<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpiredColumnToAvailabilities extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('availabilities', function($table)
		{
		    $table->boolean('expired');
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
		    $table->dropColumn('expired');
		});
	}

}
