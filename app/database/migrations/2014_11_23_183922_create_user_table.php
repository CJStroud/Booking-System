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
		Schema::create('user', function(Blueprint $table)
	   {
		   $table->increments('id');
		   $table->string('forename');
		   $table->string('surname');
		   $table->string('email');
		   $table->string('password');
		   $table->string('brca');
		   $table->boolean('isAdmin');
	   });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
