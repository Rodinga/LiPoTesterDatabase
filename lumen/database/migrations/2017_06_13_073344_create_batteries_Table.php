<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batteries', function(Blueprint $table){
          $table->increments('id');
          $table->double('rated_cap');
          $table->string('source');
          $table->string('manufacturer');
          $table->string('part_number');
          $table->enum('choices',['Good','Bad','Storage']);
          $table->timestamp('added_on');
          $table->string('assignment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
