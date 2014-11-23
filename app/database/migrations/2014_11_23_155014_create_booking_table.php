<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking', function(Blueprint $table)
	   {
		   $table->increments('id');
		   $table->integer('event_id');
		   $table->integer('user_id');
		   $table->integer('class_id');
		   $table->integer('frequency1_id');
		   $table->integer('frequency2_id');
		   $table->integer('frequency3_id');
		   $table->integer('skill');
		   $table->string('transponder');
	   });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('booking');
	}

}
