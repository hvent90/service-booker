<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpertiseGroup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expertisegroups', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->text('description');
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
		Schema::drop('expertisegroups');
	}
}
