<?php

namespace Pratiksh\Adminetic\Console\Commands;

use Illuminate\Console\Command;
use Pratiksh\Adminetic\Models\Admin\Role;
use Pratiksh\Adminetic\Services\MakePermission;

class MakePermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:permission {name : Model Class (Singular), e.g role, Place, Car, Post} {role=0 : Role ID} {--all} {--onlyFlags : Generate flags only without files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Permission Views and Flags for Model';

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
        $name = $this->argument('name');

        $role_id = $this->argument('role');

        $role = Role::find($role_id);

        $only_flags = $this->option('onlyFlags') ?? 0;

        if ($this->option('all')) {
            $for_all = $this->option('all');
        } else {
            $for_all = 0;
        }

        if ($role_id == 0 && $for_all != 1) {
            $this->error('Role ID or --all flag must be given');
        } elseif ($role && $for_all) {
            $this->error('Only one among role id aruguemwnt or --all flag option is accepted.');
        } else {
            if (isset($role) && $role_id != 0 ? ($role->name == 'superadmin') : false) {
                $this->info('No permission is needed for Super Admin');
            } else {
                MakePermission::makePermission($name, $role_id, $for_all, $only_flags);
                $this->info('Permission'.$only_flags ? 'view and' : 'flags made for model '.$name);
            }
        }
    }
}
