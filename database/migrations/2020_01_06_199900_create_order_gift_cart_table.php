<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGiftCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_gift_cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('cart_id')->index();
            $table->foreign('cart_id')->references('id')->on('gift_carts')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_gift_cart');
        Schema::table('order_gift_cart', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['cart_id']);
        });
    }
}
