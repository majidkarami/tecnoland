<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('filter_id');
            $table->integer('value');
            $table->unsignedBigInteger('product_id');
            $table->foreign('filter_id')->references('id')->on('filter')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filter_product');
        Schema::table('filter_product', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropForeign(['product_id']);
        });
    }
}
