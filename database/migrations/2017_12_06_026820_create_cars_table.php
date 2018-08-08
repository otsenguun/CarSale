<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('car_name')->nullable();
            $table->string('price')->nullable();
            $table->string('temp')->nullable();
            $table->string('type')->nullable();
            $table->longText('description')->nullable();
            $table->integer('car_product_id')->unsigned()->nullable();
            $table->integer('car_mark_id')->unsigned()->nullable();
            $table->timestamp('last_added');
            $table->integer('km_run')->nullable()->default('0');
            $table->string('speedbox')->nullable();
            $table->string('engine')->nullable();
            $table->string('engine_size')->nullable()->default('0');
            $table->string('wheel')->nullable();
            $table->string('outcolor')->nullable();
            $table->string('incolor')->nullable();
            $table->integer('maded_by')->nullable()->default('0');
            $table->date('mongolia_in')->nullable();
            $table->string('car_img')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

             $table->foreign('car_product_id')->references('id')->on('car_product')->onDelete('set null')->onUpdate('CASCADE');;
             $table->foreign('car_mark_id')->references('id')->on('car_mark')->onDelete('set null')->onUpdate('CASCADE');;
             $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('CASCADE');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('cars', function (Blueprint $table){
         

            $table->dropForeign(['car_product_id']);
            $table->dropForeign(['car_mark_id']);
            $table->dropForeign(['user_id']);
    });
         Schema::drop('cars');
    
    }
}
