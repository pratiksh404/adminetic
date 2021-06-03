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
            '--tag' => ['adminetic-config'],
        ]);
        $this->info('Adminetic config file published ... ✅');
        $this->call('vendor:publish', [
            '--tag' => ['adminetic-assets-files'],
        ]);
        $this->info('Adminetic asset files published ... ✅');
        $this->call('vendor:publish', [
            '--tag' => ['adminetic-static-files'],
        ]);
        $this->info('Adminetic static files published ... ✅');
        $this->addMyMenu();
        $this->info('Adminetic Installed');
        $this->info('Star to the admenictic repo would be appreciated.');
    }

    private function addMyMenu()
    {
        $modelTemplate = file_get_contents(__DIR__ . '/../../Console/Commands/AdminStubs/MyMenu.stub');

        if (!file_exists($path = app_path('Services'))) {
            mkdir($path, 0777, true);
        }

        $file = app_path('Services/MyMenu.php');
        file_put_contents($file, $modelTemplate);
        if (file_exists($file)) {
            $this->info('MyMenu created successfully ... ✅');
        } else {
            $this->error('Failed to create MyMenu ...');
        }
    }

    protected static function getStub($type)
    {
        return file_get_contents(__DIR__ . "/../../Console/Commands/AdminStubs/$type.stub");
    }
}
