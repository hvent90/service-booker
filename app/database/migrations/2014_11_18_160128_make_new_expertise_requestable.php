<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNewExpertiseRequestable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('expertise', function($table)
		{
		    $table->boolean('requested');
		    $table->integer('requested_adv_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('expertise', function($table)
		{
		    $table->dropColumn('requested');
		    $table->dropColumn('requested_adv_id');
		});
	}

}
