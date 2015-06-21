<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageCollectionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('image_collections', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments("id")->unsigned();

            $table->string("name");
            $table->string("slug");
            $table->string("path");
            $table->integer("collection_id")->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('image_collections');
    }

}
