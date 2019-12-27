<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_user', function (Blueprint $table) {
          $table->unsignedBigInteger('coupon_id')->index();
          $table->foreign(['coupon_id'])->references('id')->on('coupons')->onDelete('cascade')->onUpdate('cascade');

          $table->unsignedBigInteger('user_id')->index();
          $table->foreign(['user_id'])->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon_user', function (Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('coupon_user');
    }
}
