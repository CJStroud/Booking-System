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
		Schema::create( 'bookings', function( $table ) {

			$table->engine = 'InnoDB';

			$table->increments('id');

			$table->integer('user_id')->unsigned();
			$table->integer('event_id')->unsigned();
			$table->integer('class_id')->unsigned();

			$table->string('transponder');
			$table->integer('skill_level');

			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('event_id')->references('id')->on('events');
			$table->foreign('class_id')->references('id')->on('classes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('bookings');
	}

}
