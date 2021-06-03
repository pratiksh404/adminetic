<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Pratiksh\Adminetic\Models\Admin\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! config('adminetic.migrate_with_dummy', false)) {
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
            ]);

            $role = Role::where('name', 'admin')->first();

            $admin->roles()->attach($role);
            $admin->profile()->create();
        }
    }
}
