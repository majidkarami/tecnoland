<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazings', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('m_title');
            $table->string('title');
            $table->text('tozihat');
            $table->integer('price1');
            $table->integer('price2');
            $table->integer('time');
            $table->integer('timestamp');
            $table->bigInteger('product_id')->unsigned();
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
        Schema::dropIfExists('amazings');
        Schema::table('amazings', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
    }
}
