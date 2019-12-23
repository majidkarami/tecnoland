<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
          $table->unsignedBigInteger('order_id')->index();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');

          $table->unsignedBigInteger('product_id')->index();
          $table->foreign(['product_id'])->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

          $table->integer('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('order_product');
    }
}
