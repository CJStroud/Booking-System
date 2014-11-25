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

		DB::statement('CREATE TABLE booking (
		   id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
		   user_id integer NOT NULL,
		   event_id integer NOT NULL,
		   class_id integer NOT NULL,
		   frequency_1_id integer NOT NULL,
		   frequency_2_id integer NOT NULL,
		   frequency_3_id integer NOT NULL,
		   transponder varchar(60) NOT NULL,
		   skill integer NOT NULL
		);');


		DB::statement('ALTER TABLE booking
			ADD CONSTRAINT booking_event_id_fk
		    FOREIGN KEY (event_id)
			REFERENCES event (id)');

		DB::statement('ALTER TABLE booking
			ADD CONSTRAINT booking_class_id_fk
			FOREIGN KEY (class_id)
			REFERENCES class(id);');

		DB::statement('ALTER TABLE booking
			ADD CONSTRAINT booking_user_id_fk
		    FOREIGN KEY (user_id)
			REFERENCES user (id)
		');

		DB::statement('ALTER TABLE booking
			ADD CONSTRAINT booking_frequency1_id_fk
			FOREIGN KEY (frequency_1_id)
			REFERENCES frequency (id)
		');

		DB::statement('ALTER TABLE booking
			ADD CONSTRAINT booking_frequency2_id_fk
			FOREIGN KEY (frequency_2_id)
			REFERENCES frequency (id)
		');

		DB::statement('ALTER TABLE booking
			ADD CONSTRAINT booking_frequency3_id_fk
			FOREIGN KEY (frequency_3_id)
			REFERENCES frequency (id)
		');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE booking
			DROP FOREIGN KEY booking_event_id_fk');

		DB::statement('ALTER TABLE booking
			DROP FOREIGN KEY booking_class_id_fk');

		DB::statement('ALTER TABLE booking
			DROP FOREIGN KEY booking_user_id_fk');

		DB::statement('ALTER TABLE booking
			DROP FOREIGN KEY booking_frequency1_id_fk');

		DB::statement('ALTER TABLE booking
			DROP FOREIGN KEY booking_frequency2_id_fk');

		DB::statement('ALTER TABLE booking
			DROP FOREIGN KEY booking_frequency3_id_fk');

		DB::statement('DROP TABLE booking');

	}

}
