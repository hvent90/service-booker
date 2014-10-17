<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Requestee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requestees', function($table)
		{
		    $table->increments('id');
		    $table->string('email');
		    $table->string('name');
		    $table->text('notes');
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
		Schema::drop('requestees');
	}

}
