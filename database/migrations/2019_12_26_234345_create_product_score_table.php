<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_score', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->index();;
            $table->string('value');
            $table->unsignedBigInteger('user_id')->index();;
            $table->integer('time');
        });

        Schema::table('product_score', function (Blueprint $table) {
            $table->foreign(['user_id'])->references('id')->on('users')->onUpdate('cascade');
            $table->foreign(['product_id'])->references('id')->on('products')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_score');
        Schema::table('product_score', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['product_id']);
        });
    }
}
