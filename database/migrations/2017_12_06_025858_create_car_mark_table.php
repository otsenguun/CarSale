<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('car_mark', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark_name')->nullable();
            $table->integer('car_product_id')->unsigned()->nullable();
            $table->timestamps();
         });

         Schema::table('car_mark', function($table) {
            $table->foreign('car_product_id')->references('id')->on('car_product')->onDelete('set null');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('car_mark', function (Blueprint $table) {
             $table->dropForeign('car_mark_car_product_id_foreign');

            });
        Schema::drop('car_mark');
    }
}
