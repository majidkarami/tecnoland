<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->tinyInteger('status');
            $table->float('price');
            $table->float('discount_price')->nullable();
            $table->text('description');

            $table->unsignedBigInteger('category_id')->index();
            $table->foreign(['category_id'])->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('brand_id')->index();
            $table->foreign(['brand_id'])->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign(['user_id'])->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('products');
    }
}
