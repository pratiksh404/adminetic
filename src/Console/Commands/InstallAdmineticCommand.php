<?php

namespace Pratiksh\Adminetic\Console\Commands;

use Illuminate\Console\Command;

class InstallAdmineticCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:adminetic {--a|assets : Installs only asset files} {--c|config : Installs only config file} {--f|view : Installs only view files} {--m|migration : Installs only migration files} {--d|dummy : Installs only seed files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to install adminetic';

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
        if (!$this->option('config') && !$this->option('view') && !$this->option('config') && !$this->option('migration') && !$this->option('dummy') && !$this->option('assets')) {
            $this->call('vendor:publish', [
                '--tag' => ['adminetic-config']
            ]);
            $this->info("Adminetic config file published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['adminetic-views']
            ]);
            $this->info("Adminetic view files published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['adminetic-migrations']
            ]);
            $this->info("Adminetic migration files published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['adminetic-seeders']
            ]);
            $this->info("Adminetic seeding files published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['adminetic-assets-files']
            ]);
            $this->info("Adminetic asset files published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['adminetic-static-files']
            ]);
            $this->info("Adminetic static files published ... ✅");
            $this->info("Adminetic Installed");
        } else {
            if ($this->option('config')) {
                $this->call('vendor:publish', [
                    '--tag' => ['adminetic-config']
                ]);
                $this->info("Adminetic config file published ... ✅");
            }
            if ($this->option('view')) {
                $this->call('vendor:publish', [
                    '--tag' => ['adminetic-views']
                ]);
                $this->info("Adminetic view files published ... ✅");
            }
            if ($this->option('migration')) {
                $this->call('vendor:publish', [
                    '--tag' => ['adminetic-migrations']
                ]);
                $this->info("Adminetic migration files published ... ✅");
            }
            if ($this->option('dummy')) {
                $this->call('vendor:publish', [
                    '--tag' => ['adminetic-seeders']
                ]);
                $this->info("Adminetic seeding files published ... ✅");
            }
            if ($this->option('assets')) {
                $this->call('vendor:publish', [
                    '--tag' => ['adminetic-assets-files']
                ]);
                $this->info("Adminetic asset files published ... ✅");
                $this->call('vendor:publish', [
                    '--tag' => ['adminetic-static-files']
                ]);
                $this->info("Adminetic static files published ... ✅");
            }
        }
    }
}
