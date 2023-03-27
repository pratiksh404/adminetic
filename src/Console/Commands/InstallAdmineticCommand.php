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
        $this->line("
                       _           _            _   _      
              /\      | |         (_)          | | (_)     
             /  \   __| |_ __ ___  _ _ __   ___| |_ _  ___ 
            / /\ \ / _` | '_ ` _ \| | '_ \ / _ \ __| |/ __|
           / ____ \ (_| | | | | | | | | | |  __/ |_| | (__ 
          /_/    \_\__,_|_| |_| |_|_|_| |_|\___|\__|_|\___|                                                                                                 
        ");
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
        $this->info('My Menu Added ... ✅');
        $this->addMyDashboard();
        $this->info('My Dashboard Added ... ✅');
        $this->addAdminServiceProvider();
        $this->info('Header Added ... ✅');
        $this->addHeader();
        $this->info('Footer Added ... ✅');
        $this->addFooter();
        $this->info('Adminetic Installed ... ✅');
        $this->info('Star to the admenictic repo would be appreciated.');
    }

    private function addAdminServiceProvider()
    {
        $adminServiceProviderTemplate = file_get_contents(__DIR__.'/../../Console/Commands/AdminStubs/AdminServiceProvider.stub');
        $adminServiceProviderfile = app_path('Providers/AdminServiceProvider.php');
        file_put_contents($adminServiceProviderfile, $adminServiceProviderTemplate);
        if (file_exists($adminServiceProviderfile)) {
            $this->info('AdminServiceProvider created successfully ... ✅');
        } else {
            $this->error('Failed to create AdminServiceProvider ...');
        }
    }

    private function addMyMenu()
    {
        $modelTemplate = file_get_contents(__DIR__.'/../../Console/Commands/AdminStubs/MyMenu.stub');

        if (! file_exists($path = app_path('Services'))) {
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

    private function addMyDashboard()
    {
        $myDashboardTemplate = file_get_contents(__DIR__.'/../../Console/Commands/AdminStubs/MyDashboard.stub');
        $myDashboardIndexTemplate = file_get_contents(__DIR__.'/../../Console/Commands/AdminStubs/DashboardIndex.stub');

        if (! file_exists($path = app_path('Services'))) {
            mkdir($path, 0777, true);
        }
        if (! file_exists($path = resource_path('views/admin/dashboard'))) {
            mkdir($path, 0777, true);
        }
        if (! file_exists($path = resource_path('views/admin/layouts/modules/dashboard'))) {
            mkdir($path, 0777, true);
        }
        $myDashboardIndexfile = resource_path('views/admin/dashboard/index.blade.php');
        file_put_contents($myDashboardIndexfile, $myDashboardIndexTemplate);
        if (file_exists($myDashboardIndexfile)) {
            $this->info('MyDashboardIndex created successfully ... ✅');
        } else {
            $this->error('Failed to create MyDashboardIndex ...');
        }
        $dashboardScript = resource_path('views/admin/layouts/modules/dashboard/scripts.blade.php');
        file_put_contents(resource_path('views/admin/layouts/modules/dashboard/scripts.blade.php'), '');
        if (file_exists($dashboardScript)) {
            $this->info('MyDashboardScripts created successfully ... ✅');
        } else {
            $this->error('Failed to create MyDashboardScripts ...');
        }

        $myDashboardFilefile = app_path('Services/MyDashboard.php');
        file_put_contents($myDashboardFilefile, $myDashboardTemplate);
        if (file_exists($myDashboardFilefile)) {
            $this->info('MyDashboard created successfully ... ✅');
        } else {
            $this->error('Failed to create MyDashboard ...');
        }
    }

    protected function addHeader()
    {
        $myHeaderTemplate = file_get_contents(__DIR__.'/../../Console/Commands/AdminStubs/HeaderView.stub');

        if (! file_exists($path = resource_path('views/admin/layouts/components'))) {
            mkdir($path, 0777, true);
        }

        $myHeaderFilefile = resource_path('views/admin/layouts/components/header.blade.php');
        file_put_contents($myHeaderFilefile, $myHeaderTemplate);
        if (file_exists($myHeaderFilefile)) {
            $this->info('Header view created successfully ... ✅');
        } else {
            $this->error('Failed to create header view ...');
        }
    }

    protected function addFooter()
    {
        $myFooterTemplate = file_get_contents(__DIR__.'/../../Console/Commands/AdminStubs/FooterView.stub');

        if (! file_exists($path = resource_path('views/admin/layouts/components'))) {
            mkdir($path, 0777, true);
        }

        $myFooterFilefile = resource_path('views/admin/layouts/components/footer.blade.php');
        file_put_contents($myFooterFilefile, $myFooterTemplate);
        if (file_exists($myFooterFilefile)) {
            $this->info('Footer view created successfully ... ✅');
        } else {
            $this->error('Failed to create footer view ...');
        }
    }

    protected static function getStub($type)
    {
        return file_get_contents(__DIR__."/../../Console/Commands/AdminStubs/$type.stub");
    }
}
