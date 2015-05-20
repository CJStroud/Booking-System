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
		Schema::create( 'events', function( $table ) {

			$table->engine = 'InnoDB';

			$table->increments('id');

			$table->string('name', 60);
			$table->string('slug', 60);

			$table->integer('start_time');
			$table->integer('close_time');
                        
                        $table->boolean('cancelled');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('events');
	}

}
