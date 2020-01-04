<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cat_id');
            $table->string('name');
            $table->smallInteger('filed');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
        Schema::table('item', function (Blueprint $table) {
            $table->dropForeign(['cat_id']);
        });
    }
}
