<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizechartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizecharts', function (Blueprint $table) {
            $table->id();
            
            
            $table->double('weight_start');
            $table->double('weight_end');
            $table->double('height_start');
            $table->double('height_end');
            
           

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
        Schema::dropIfExists('sizecharts');
    }
}
