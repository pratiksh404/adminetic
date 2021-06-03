<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! config('adminetic.migrate_with_dummy', false)) {
            Artisan::call('make:permission Role 2 --onlyFlags');
            Artisan::call('make:permission Permission 2 --onlyFlags');
            Artisan::call('make:permission User 2 --onlyFlags');

            Artisan::call('make:permission Setting 2 --onlyFlags');
            Artisan::call('make:permission Preference 2 --onlyFlags');
        }
    }
}
