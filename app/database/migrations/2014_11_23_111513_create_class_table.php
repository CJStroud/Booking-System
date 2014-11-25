<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		DB::statement('CREATE TABLE class (
			id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name varchar(60) NOT NULL,
			active boolean NOT NULL
			);');

	}

	public function down()
	{
		DB::statement('DROP TABLE class');
	}

}
