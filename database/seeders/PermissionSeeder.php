<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        Artisan::call('make:permission Role 2 --onlyFlags');
        Artisan::call('make:permission Permission 2 --onlyFlags');
        Artisan::call('make:permission User 2 --onlyFlags');

        Artisan::call('make:permission Setting 2 --onlyFlags');
        Artisan::call('make:permission Preference 2 --onlyFlags');
    }
}
