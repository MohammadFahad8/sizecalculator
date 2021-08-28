<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedsizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selectedsizes', function (Blueprint $table) {
            $table->id();
            $table->double('product_id')->unique();
            $table->string('title');
            $table->string('image_link');
            $table->string('vendor');
            $table->string('admin_graphql_api_id');
           
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
        Schema::dropIfExists('selectedsizes');
    }
}
