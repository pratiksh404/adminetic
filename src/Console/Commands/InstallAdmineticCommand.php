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
    protected $signature = 'install:adminetic';

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
        $this->call('vendor:publish', [
            '--tag' => ['adminetic-config']
        ]);
        $this->info("Adminetic config file published ... ✅");
        $this->call('vendor:publish', [
            '--tag' => ['adminetic-assets-files']
        ]);
        $this->info("Adminetic asset files published ... ✅");
        $this->call('vendor:publish', [
            '--tag' => ['adminetic-static-files']
        ]);
        Artisan::call('make:service MyMenu');
        $this->info("Adminetic static files published ... ✅");
        $this->info("Adminetic Installed");
    }
}
