<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name');
            $table->bigInteger('product_id')->unsigned();
            $table->integer('parent_id');
            $table->string('date')->nullable();
            $table->integer('time')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('services');
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
    }
}
