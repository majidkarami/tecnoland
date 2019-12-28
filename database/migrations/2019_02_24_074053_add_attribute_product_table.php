<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributeProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributeValue_product', function (Blueprint $table) {
          $table->unsignedBigInteger('attributeValue_id')->index();

          $table->foreign(['attributeValue_id'])->references('id')->on('attributesValue')->onDelete('cascade')->onUpdate('cascade');;
>>>>>>> 16391d25713a673a29bc70f3b67814d774edc3a8

          $table->unsignedBigInteger('product_id')->index();
          $table->foreign(['product_id'])->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');;

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
        Schema::table('attributeValue_product', function (Blueprint $table) {
            $table->dropForeign(['attributeValue_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('attributeValue_product');
    }
}
