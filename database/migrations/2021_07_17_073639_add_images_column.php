<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attributetypes', function (Blueprint $table) {
            //
            $table->text('img_one')->default('https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-1.svg');
            $table->text('img_second')->default('https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-2.svg');
            $table->text('img_third')->default('https://widget-frontend-e16bltk24-wair.vercel.app/images/male-ecto-chest-3.svg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attributetypes', function (Blueprint $table) {
            //
        });
    }
}
