<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advisor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advisors', function($table)
		{
		    $table->increments('id');
		    $table->string('first_name');
		    $table->string('last_name');
		    $table->string('email')->unique();
		    $table->string('password');
		    $table->integer('company_id');
		    $table->dateTime('created_at');
		    $table->dateTime('updated_at');
		    $table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('advisors');
	}

}
