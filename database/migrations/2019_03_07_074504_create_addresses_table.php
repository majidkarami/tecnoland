<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('address');
            $table->string('company')->nullable();

            $table->unsignedBigInteger('province_id')->index();
            $table->foreign(['province_id'])->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');;

            $table->unsignedBigInteger('city_id')->index();
            $table->foreign(['city_id'])->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');;

            $table->string('post_code');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign(['user_id'])->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
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
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('addresses');
    }
}
