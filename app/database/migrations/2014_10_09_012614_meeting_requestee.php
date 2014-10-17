<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MeetingRequestee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meeting_requestee', function($table)
		{
		    $table->increments('id');
		    $table->integer('meeting_id');
		    $table->integer('requestee_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meeting_requestee');
	}

}
