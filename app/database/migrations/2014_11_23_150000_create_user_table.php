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
    Schema::create( 'users', function( $table ) {

      $table->engine = 'InnoDB';

      $table->increments('id');

      $table->string('forename', 60);
      $table->string('surname', 60);
      $table->string('email');
      $table->string('password');
      $table->string('secret');
      $table->string('brca');
      $table->string('transponder');

      $table->integer('skill');

      $table->boolean('is_admin');

      $table->integer('banned');
      $table->boolean('banned_reason');

      $table->timestamps();
      $table->softDeletes();
      $table->rememberToken();

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }

}
