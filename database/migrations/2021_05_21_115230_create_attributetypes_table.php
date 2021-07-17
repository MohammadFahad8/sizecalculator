<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributetypes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('product_id');
            $table->bigInteger('size_one')->default(30);
            $table->bigInteger('size_second')->default(40);
            $table->bigInteger('size_third')->default(50);
             
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
        Schema::dropIfExists('attributetypes');
    }
}
