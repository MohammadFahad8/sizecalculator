<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyfeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodyfeatures', function (Blueprint $table) {
            $table->id();
            $table->string('attr_name');
            $table->integer('attr_measurement_start');
            $table->integer('attr_measurement_end');
            $table->string('predicted_size');
            $table->integer('sizechart_id');
            $table->integer('attr_id');
            $table->boolean('status')->default(1);

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
        Schema::dropIfExists('bodyfeatures');
    }
}
