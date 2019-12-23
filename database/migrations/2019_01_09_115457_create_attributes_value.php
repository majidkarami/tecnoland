<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributesValue', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('attributeGroup_id')->index();
            $table->foreign(['attributeGroup_id'])->references('id')->on('attributesGroup')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('attributesValue', function (Blueprint $table) {
            $table->dropForeign(['attributeGroup_id']);
        });
        Schema::dropIfExists('attributesValue');
    }
}
