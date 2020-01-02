<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('code');
            $table->string('title_url');
            $table->string('code_url');
            $table->bigInteger('price')->default('0');
            $table->bigInteger('discounts')->default('0');
            $table->integer('view')->default('0');
            $table->text('text')->nullable();
            $table->smallInteger('product_status');
            $table->smallInteger('bon')->default('0');
            $table->smallInteger('show_product')->default('0');
            $table->integer('product_number')->default('0');
            $table->integer('order_product')->default('0');
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->smallInteger('special');
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
        Schema::dropIfExists('product');
    }
}
