<?php

namespace Pratiksh\Adminetic\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Pratiksh\Adminetic\Models\Admin\Role;

class AdmineticDummyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adminetic:dummy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch dummy data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (! config('adminetic.migrate_with_dummy', false)) {
            // Generating Roles
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

            // Generating Permission
            Artisan::call('make:permission Role 2 --onlyFlags');
            Artisan::call('make:permission Permission 2 --onlyFlags');
            Artisan::call('make:permission User 2 --onlyFlags');

            Artisan::call('make:permission Setting 2 --onlyFlags');
            Artisan::call('make:permission Preference 2 --onlyFlags');

            // Generating User
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
            ]);

            $role = Role::where('name', 'admin')->first();

            $admin->roles()->attach($role);
            $admin->profile()->create();
            $this->info('Dummy data seeded ... ✅');
        } else {
            $this->error('Dummy data seeding failed because seed on migration is turned on config file.');
            $this->warning("Change to 'migrate_with_dummy' => false");
        }
    }
}
