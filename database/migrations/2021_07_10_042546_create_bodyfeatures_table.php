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
            $table->integer('chest');
            $table->integer('stomach');
            $table->integer('bottom');
            $table->string('predicted_size');
            $table->integer('sizechart_id');
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
