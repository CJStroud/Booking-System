<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		DB::statement('CREATE TABLE event (
		   id integer NOT NULL  PRIMARY KEY AUTO_INCREMENT,
		   name varchar(60) NOT NULL,
		   slug varchar(60) NOT NULL,
		   event_datetime int NOT NULL,
		   close_datetime int NOT NULL
		);');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('DROP TABLE event');
	}

}
