<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('level')->default(0);
            $table->timestamps();
        });

        // Migrate with dummy
        if (config('adminetic.migrate_with_dummy', false)) {
            $roles = [
                [
                    'name' => 'superadmin',
                    'description' => 'This is a super admin user',
                    'level' => 5,
                ],
                [
                    'name' => 'admin',
                    'description' => 'This is an admin user',
                    'level' => 4,
                ],
                [
                    'name' => 'moderator',
                    'description' => 'This is an moderator',
                    'level' => 3,
                ],
                [
                    'name' => 'editor',
                    'description' => 'This is an editor',
                    'level' => 2,
                ],
                [
                    'name' => 'user',
                    'description' => 'This is an normal user',
                    'level' => 1,
                ],
                [
                    'name' => 'unverified',
                    'description' => 'This is an unverified user',
                    'level' => 0,
                ],
            ];

            DB::table('roles')->insert($roles);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
