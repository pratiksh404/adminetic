<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'superadmin',
                'description' => 'This is a super admin user',
                'level' => 5
            ],
            [
                'name' => 'admin',
                'description' => 'This is an admin user',
                'level' => 4
            ],
            [
                'name' => 'moderator',
                'description' => 'This is an moderator',
                'level' => 3
            ],
            [
                'name' => 'editor',
                'description' => 'This is an editor',
                'level' => 2
            ],
            [
                'name' => 'user',
                'description' => 'This is an normal user',
                'level' => 1
            ],
            [
                'name' => 'unverified',
                'description' => 'This is an unverified user',
                'level' => 0
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
