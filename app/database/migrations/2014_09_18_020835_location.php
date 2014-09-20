<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Location extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->string('address');
		    $table->string('lattitude');
		    $table->string('longitutde');
		    $table->string('website');
		    $table->integer('company_id');
		    $table->integer('advisor_id');
		    $table->dateTime('created_at');
		    $table->dateTime('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locations');
	}

}
