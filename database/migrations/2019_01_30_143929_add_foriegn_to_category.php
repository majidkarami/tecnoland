<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForiegnToCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributegroup_category', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id')->index();
            $table->foreign(['category_id'])->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');;

            $table->unsignedBigInteger('attributeGroup_id')->index();
            $table->foreign(['attributeGroup_id'])->references('id')->on('attributesGroup')->onDelete('cascade')->onUpdate('cascade');;

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
        Schema::table('attributegroup_category', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['attributeGroup_id']);
        });
        Schema::dropIfExists('attributegroup_category');
    }
}
