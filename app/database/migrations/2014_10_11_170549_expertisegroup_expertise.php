<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpertiseGroupExpertise extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expertisegroup_expertise', function($table)
		{
		    $table->increments('id');
		    $table->integer('expertise_group_id');
		    $table->integer('expertise_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expertisegroup_expertise');
	}

}
