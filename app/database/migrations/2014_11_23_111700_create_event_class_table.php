<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('CREATE TABLE event_class (
		   id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
		   class_id integer NOT NULL,
		   event_id integer NOT NULL,
		   maximum integer NOT NULL,
		   locked boolean NOT NULL
		);');

		DB::statement('ALTER TABLE event_class
			ADD CONSTRAINT class_id_fk
			FOREIGN KEY (class_id)
			REFERENCES class(id);');

		DB::statement('ALTER TABLE event_class
			ADD CONSTRAINT event_id_fk
			FOREIGN KEY event_id_fk (event_id)
			REFERENCES event(id);');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE event_class
			DROP FOREIGN KEY class_id_fk');

		DB::statement('ALTER TABLE event_class
			DROP FOREIGN KEY event_id_fk');

		DB::statement('DROP TABLE event_class');
	}

}
