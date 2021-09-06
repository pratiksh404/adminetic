<?php

namespace Pratiksh\Adminetic\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AdmineticResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adminetic:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Admin Panel Reset.';

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
        $this->info('Migrating ... ');
        Artisan::call('migrate:fresh');
        $this->info('Dumping Data ... ');
        Artisan::call('adminetic:dummy');
        $this->info('Dumping Seeding ... ');
        Artisan::call('db:seed');
        $this->info('Optimizing ... ');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('optimize');
    }
}
