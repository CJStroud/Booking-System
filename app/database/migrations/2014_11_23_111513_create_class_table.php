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
		Schema::create( 'classes', function( $table ) {

			$table->engine = 'InnoDB';

			$table->increments('id');

			$table->string('name', 60);
			$table->boolean('active');

			$table->softDeletes();

		});
	}

	public function down()
	{
		Schema::dropIfExists( 'classes' );
	}

}
