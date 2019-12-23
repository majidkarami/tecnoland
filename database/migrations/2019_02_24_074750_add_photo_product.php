<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_product', function (Blueprint $table) {
          $table->unsignedBigInteger('photo_id')->index();
          $table->foreign('photo_id')->references('id')->on('photos');

          $table->unsignedBigInteger('product_id')->index();
          $table->foreign(['product_id'])->references('id')->on('products')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photo_product', function (Blueprint $table) {
            $table->dropForeign(['photo_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('photo_product');
    }
}
