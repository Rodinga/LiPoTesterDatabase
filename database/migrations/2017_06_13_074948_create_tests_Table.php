<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        * REVIEW DATABASE NORMAL FORMS AND CHECK UP ON CASCADE DELETION
        */
         Schema::create('test', function(Blueprint $table){
          $table->increments('id');
          $table->long('TestNum');
          $table->double('MiliAmpRating');
          $table->double('WattHourRating');
          $table->double('AverageRating');
          $table->double('AverageCurrent');
          $table->double('StartVoltage');
          $table->double('FinalVoltage');
          $table->timestamp('DateTest');
          $table->json('GraphData');
          $table->foreign('BatteryID')->references('id')->on('batteries')->onDelete('cascade');
        });
        Schema::create('racks', function(Blueprint $table){
            $table->increments('id');
            $table->string('RackName');
        });
        Schema::enableForeignKeyConstraints();
        Schema::create('batteries', function(Blueprint $table){
            $table->foreign('assignment')->references('id')->on('racks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test', function(Blueprint $table){
            $table->dropColumn(['id','TestNum', 'MiliAmpRating','WattHourRating','AverageRating',
            'AverageCurrent','StartVoltage','FinalVoltage','DateTest','GraphData']);
        });
    }
}
