<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingFrequencies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking_frequencies', function(Blueprint $table) {

			$table->engine = 'InnoDB';

			$table->increments('id');

			$table->integer('booking_id')->unsigned();
			$table->integer('frequency_id')->unsigned();

			$table->foreign('booking_id')->references('id')->on('bookings');
			$table->foreign('frequency_id')->references('id')->on('frequencies');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('booking_frequencies');
	}

}
