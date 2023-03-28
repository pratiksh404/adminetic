<?php

namespace Pratiksh\Adminetic\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Pratiksh\Adminetic\Services\MakeAPIResource;

class MakeAPIForAllModelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:api-all {--rest} {--client} {--v=v1} {--except=*} {--path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make API Resource for all available model';

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
        if ($this->confirm('Do you wish to continue? Any existing api resources might be replaced.')) {
            $excluded_models = $this->option('except');
            $path = $this->option('path') ?? 'Models';
            $models = getAllModelNames(app_path($path));
            foreach ($models as $name) {
                if (Schema::hasTable(Str::plural($name)) && ! in_array($name, $excluded_models ?? [])) {
                    $path = $this->getModelPath($name);
                    $version = $this->option('v');
                    if ($this->option('rest')) {
                        MakeAPIResource::makeRestAPI($name, $path, $version);
                        $this->info('Restful API Resource created for model '.$name.' ... ✅');
                    } elseif ($this->option('client')) {
                        MakeAPIResource::makeClientAPI($name, $path, $version);
                        $this->info('Client API created for model '.$name.' ... ✅');
                    } else {
                        MakeAPIResource::makeAPI($name, $path, $version);
                        $this->info('API Resource created for model '.$name.' ... ✅');
                    }
                }
            }
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
