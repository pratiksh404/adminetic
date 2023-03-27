<?php

namespace Pratiksh\Adminetic\Console\Commands;

use Illuminate\Console\Command;
use Pratiksh\Adminetic\Services\RepositoryPatternService;

class MakeRepositoryPatternCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {name : Model Class (Singular), e.g User, Place, Car, Post} {--r|request : Make Repo Pattern with request}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Repository Pattern with a single command';

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
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        $makeRequest = $this->option('request');

        RepositoryPatternService::ImplementNow($name, $makeRequest);

        $this->info('Repository pattern implemented for model '.$name);
    }
}
