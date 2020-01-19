<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertDataIntoRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $roles = array(
                array('id' => '1', 'name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '2', 'name' => 'author', 'created_at' => NULL, 'updated_at' => NULL),
                array('id' => '3', 'name' => 'user', 'created_at' => NULL, 'updated_at' => NULL),
            );

            DB::table('roles')->insert($roles);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
