<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('option_name')->nullable();
            $table->string('option_value')->nullable();
        });

        DB::table('settings')->insert([
            'option_name'=>'TerminalId',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'Username',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'Password',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'MerchantID',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'name',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'email',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'address',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'tel',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'mobile',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'url_admin',
            'option_value'=>'admin_login'
        ]);
        DB::table('settings')->insert([
            'option_name'=>'price_post',
            'option_value'=>'10000'
        ]);
        DB::table('settings')->insert([
            'option_name'=>'telegram',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'instagram',
            'option_value'=>''
        ]);
        DB::table('settings')->insert([
            'option_name'=>'whatsapp',
            'option_value'=>''
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
