<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     *
     * Create Table
     *
     *@return void
     *
     */

    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     *
     * Drop Table
     *
     *@return void
     *
     */

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
