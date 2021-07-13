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
            
            
            $table->bigInteger('weight_start');
            $table->bigInteger('weight_end');
            $table->bigInteger('height_start');
            $table->bigInteger('height_end');
            $table->bigInteger('product_id');
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
        Schema::dropIfExists('sizecharts');
    }
}
