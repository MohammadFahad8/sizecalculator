<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributeimages', function (Blueprint $table) {
            $table->id();
            $table->integer('attr_size_value')->nullable();
            $table->text('attr_image_src')->nullable();
            $table->string('attribute_size_name')->nullable();
            $table->integer('attribute_type_id');
            $table->bigInteger('product_id');
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
        Schema::dropIfExists('attributeimages');
    }
}
