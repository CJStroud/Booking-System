<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('CREATE TABLE user (
		   id integer NOT NULL  PRIMARY KEY AUTO_INCREMENT,
		   forename varchar(60) NOT NULL,
		   surname varchar(60) NOT NULL,
		   email varchar(60) NOT NULL,
		   password varchar(80) NOT NULL,
		   secret varchar(20) NOT NULL,
		   brca varchar(60) NOT NULL,
		   isAdmin boolean NOT NULL
		);');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('DROP TABLE user');
	}

}
