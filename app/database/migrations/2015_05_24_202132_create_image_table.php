<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('images', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments("id")->unsigned();
            
            $table->string("name");
            $table->string("slug");
            $table->string("description");
            $table->integer("upload_id")->unsigned();
            $table->integer("collection_id")->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('images');
    }

}
