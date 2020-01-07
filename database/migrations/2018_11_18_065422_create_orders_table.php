<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('time');
            $table->string('date');
            $table->smallInteger('pay_type');
            $table->smallInteger('pay_status');
            $table->smallInteger('order_status');
            $table->string('order_read');
            $table->string('order_type');
            $table->string('order_id');
            $table->integer('total_price');
            $table->integer('price');
            $table->string('code1')->nullable();
            $table->string('code2')->nullable();

            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')->references('id')->on('user_address')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
