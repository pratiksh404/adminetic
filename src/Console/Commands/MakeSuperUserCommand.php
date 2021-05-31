<?php

namespace Pratiksh\Adminetic\Console\Commands;

use Illuminate\Console\Command;
use Pratiksh\Adminetic\Services\MakeSuperAdmin;

class MakeSuperUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:superadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to make super user.';

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
        // Authorization Password
        $authorization_password = $this->secret('Enter Authorization Password To Continue');

        if (MakeSuperAdmin::checkAuthorization($authorization_password)) {
            $this->info('Authorization Granted.');
            // Asking for name
            $name = $this->ask('Enter Super Admin Name');
            // Asking for Email
            $email = $this->ask('Enter Super Admin Email');
            // Asking for Password
            $password = $this->secret('Enter Super Admin Password');

            $this->info('Creating Super Admin ......');

            MakeSuperAdmin::make($name, $email, $password);

            $this->info('Super Admin Created Successfully');
        } else {
            $this->error('Authorization password is wrong');
        }
    }
}
