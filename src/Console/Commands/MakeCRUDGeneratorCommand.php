<?php

namespace Pratiksh\Adminetic\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Pratiksh\Adminetic\Services\CRUDGeneratorService;

class MakeCRUDGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name : Model Class (singular) e.g User} {--acl : Make Access Control System for the crud} {--api : Make API Resource of CRUD} {--rest : Make Restful API Resource of CRUD}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create CRUD.';

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

        CRUDGeneratorService::makeCRUD($name, $this);

        if ($this->option('acl')) {
            Artisan::call('make:permission '.$name.' --all');
            $this->info('ACL created ... ✅');
        }

        if ($this->option('api')) {
            Artisan::call('make:api '.$name);
            $this->info('API resource files created ... ✅');
        }

        if ($this->option('rest')) {
            Artisan::call('make:api '.$name.' --rest');
            $this->info('RestAPI files created ... ✅');
        }

        $this->info('CRUD made for model '.$name.' ... ✅');
    }
}
