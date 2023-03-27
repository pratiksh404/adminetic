<?php

namespace Pratiksh\Adminetic\Console\Commands;

use Illuminate\Console\Command;
use Pratiksh\Adminetic\Services\MakeAPIResource;

class MakeAPIResourceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:api {name : Model Class (Singular), e.g role, Place, Car, Post}  {--rest} {--client} {--v=v1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make API Resource for Model';

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
        $given_name = $this->argument('name');
        $name = $this->getModelName($given_name);
        $path = $this->getModelPath($given_name);
        $version = $this->option('v');
        if ($this->option('rest')) {
            MakeAPIResource::makeRestAPI($name, $path, $version);
            $this->info('Restful API Resource created for model '.$name);
        } elseif ($this->option('client')) {
            MakeAPIResource::makeClientAPI($name, $path, $version);
            $this->info('Client API created for model '.$name);
        } else {
            MakeAPIResource::makeAPI($name, $path, $version);
            $this->info('API Resource created for model '.$name);
        }
    }

    public function getModelName($given_name)
    {
        $explode_path = preg_split('#/#', $given_name);

        return end($explode_path);
    }

    public function getModelPath($given_name)
    {
        $explode_path = preg_split('#/#', $given_name);

        return count($explode_path) > 1 ? str_replace('/', '\\', $given_name) : ('App\\Models\\Admin\\'.$given_name);
    }
}
