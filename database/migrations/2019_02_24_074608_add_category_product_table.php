<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
          $table->unsignedBigInteger('category_id')->index();
          $table->foreign(['category_id'])->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade')->onUpdate('cascade');;

          $table->unsignedBigInteger('product_id')->index();
          $table->foreign(['product_id'])->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_product', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('category_product');
    }
}
