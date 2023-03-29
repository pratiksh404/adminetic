<?php

namespace Pratiksh\Adminetic\Providers;

use App\Models\User;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Pratiksh\Adminetic\Console\Commands\AdmineticDummyCommand;
use Pratiksh\Adminetic\Console\Commands\AdmineticResetCommand;
use Pratiksh\Adminetic\Console\Commands\ClearActivityLogCommand;
use Pratiksh\Adminetic\Console\Commands\InstallAdmineticCommand;
use Pratiksh\Adminetic\Console\Commands\MakeAPIForAllModelCommand;
use Pratiksh\Adminetic\Console\Commands\MakeAPIResourceCommand;
use Pratiksh\Adminetic\Console\Commands\MakeCRUDGeneratorCommand;
use Pratiksh\Adminetic\Console\Commands\MakePermissionCommand;
use Pratiksh\Adminetic\Console\Commands\MakeRepositoryPatternCommand;
use Pratiksh\Adminetic\Console\Commands\MakeServiceCommand;
use Pratiksh\Adminetic\Console\Commands\MakeSuperUserCommand;
use Pratiksh\Adminetic\Console\Commands\MakeTraitCommand;
use Pratiksh\Adminetic\Contracts\PermissionRepositoryInterface;
use Pratiksh\Adminetic\Contracts\PreferenceRepositoryInterface;
use Pratiksh\Adminetic\Contracts\ProfileRepositoryInterface;
use Pratiksh\Adminetic\Contracts\RoleRepositoryInterface;
use Pratiksh\Adminetic\Contracts\SettingRepositoryInterface;
use Pratiksh\Adminetic\Contracts\UserRepositoryInterface;
use Pratiksh\Adminetic\Http\Livewire\Admin\Activity\ActivityTable;
use Pratiksh\Adminetic\Http\Livewire\Admin\Profile\EditAccount;
use Pratiksh\Adminetic\Http\Livewire\Admin\Profile\EditProfile;
use Pratiksh\Adminetic\Http\Livewire\Admin\Role\AclPanel;
use Pratiksh\Adminetic\Http\Livewire\Admin\Role\Bread;
use Pratiksh\Adminetic\Http\Livewire\Admin\User\UserTable;
use Pratiksh\Adminetic\Http\Livewire\Admin\UserPreferences;
use Pratiksh\Adminetic\Http\Middleware\BouncerMiddleware;
use Pratiksh\Adminetic\Http\Middleware\RoleMiddleware;
use Pratiksh\Adminetic\Mixins\AdmineticAuthMixins;
use Pratiksh\Adminetic\Models\Admin\Preference;
use Pratiksh\Adminetic\Models\Permission;
use Pratiksh\Adminetic\Models\Role;
use Pratiksh\Adminetic\Models\Setting;
use Pratiksh\Adminetic\Policies\PermissionPolicy;
use Pratiksh\Adminetic\Policies\PreferencePolicy;
use Pratiksh\Adminetic\Policies\RolePolicy;
use Pratiksh\Adminetic\Policies\SettingPolicy;
use Pratiksh\Adminetic\Policies\UserPolicy;
use Pratiksh\Adminetic\Repositories\PermissionRepository;
use Pratiksh\Adminetic\Repositories\PreferenceRepository;
use Pratiksh\Adminetic\Repositories\ProfileRepository;
use Pratiksh\Adminetic\Repositories\RoleRepository;
use Pratiksh\Adminetic\Repositories\SettingRepository;
use Pratiksh\Adminetic\Repositories\UserRepository;
use Pratiksh\Adminetic\Services\Adminetic;
use Pratiksh\Adminetic\View\Components\Action;
use Pratiksh\Adminetic\View\Components\Card;
use Pratiksh\Adminetic\View\Components\CreatePage;
use Pratiksh\Adminetic\View\Components\EditAddButton;
use Pratiksh\Adminetic\View\Components\EditPage;
use Pratiksh\Adminetic\View\Components\IndexPage;
use Pratiksh\Adminetic\View\Components\ShowPage;
use Pratiksh\Adminetic\View\Components\Sidebar;

class AdmineticServiceProvider extends ServiceProvider
{
    // Register Policies
    protected $policies = [
        User::class => UserPolicy::class,
        Permission::class => PermissionPolicy::class,
        Role::class => RolePolicy::class,
        Setting::class => SettingPolicy::class,
        Preference::class => PreferencePolicy::class,
    ];
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/admin/dashboard';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish Ressource
        if ($this->app->runningInConsole()) {
            $this->publishResource();
        }
        // Register Resources
        $this->registerResource();
        // Register Middleware
        $this->registerMiddleware();
        // Register Directives
        $this->directives();
        // Register Policies
        $this->registerPolicies();
        // Register View Components
        $this->registerComponents();
        // Register Livewire Component
        $this->registerLivewire();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register Package Commands
        $this->registerCommands();
        /* Repository Interface Binding */
        $this->repos();
        // Register Mixins
        Route::mixin(new AdmineticAuthMixins());
        // Register Package Service Providers
        $this->app->register(AdmineticEventServiceProvider::class);
        // Register Facades
        $this->getFacades();
    }

    /**
     * Publish Package Resource.
     *
     *@return void
     */
    protected function publishResource()
    {
        // Publish Config File
        $this->publishes([
            __DIR__.'/../../config/adminetic.php' => config_path('adminetic.php'),
        ], 'adminetic-config');
        // Publish View Files
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/adminetic'),
        ], 'adminetic-views');
        // Publish Migration Files
        $this->publishes([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], 'adminetic-migrations');
        // Publish Database Seeds
        $this->publishes([
            __DIR__.'/../../database/seeders' => database_path('seeders'),
        ], 'adminetic-seeders');
        $this->publishes([
            __DIR__.'/../../payload/assets' => public_path('adminetic/assets'),
        ], 'adminetic-assets-files');
        // Publish Static Files
        $this->publishes([
            __DIR__.'/../../payload/static' => public_path('adminetic/static'),
        ], 'adminetic-static-files');
    }

    /**
     * Register Package Resource.
     *
     *@return void
     */
    protected function registerResource()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations'); // Loading Migration Files
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'adminetic'); // Loading Views Files
        $this->registerRoutes();
    }

    /**
     * Register Routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }

    /**
     * Register Route Configuration.
     *
     * @return void
     */
    protected function routeConfiguration()
    {
        return [
            'prefix' => config('adminetic.prefix', 'admin'),
            'middleware' => config('adminetic.middleware', ['web', 'auth']),
        ];
    }

    /**
     * Register Package Command.
     *
     *@return void
     */
    protected function registerCommands()
    {
        $this->commands([
            MakeCRUDGeneratorCommand::class,
            MakePermissionCommand::class,
            MakeRepositoryPatternCommand::class,
            MakeServiceCommand::class,
            MakeSuperUserCommand::class,
            MakeTraitCommand::class,
            InstallAdmineticCommand::class,
            AdmineticDummyCommand::class,
            AdmineticResetCommand::class,
            MakeAPIResourceCommand::class,
            MakeAPIForAllModelCommand::class,
            ClearActivityLogCommand::class,
        ]);
    }

    /**
     * Blade Directives.
     *
     * @return void
     */
    protected function directives()
    {
        Blade::if('hasRole', function ($roles) {
            $hasAccess = false;
            $roles_array = explode('|', $roles);
            foreach ($roles_array as $role) {
                $hasAccess = $hasAccess || Auth::user()->hasRole($role) || Auth::user()->isSuperAdmin();
            }

            return $hasAccess;
        });
        Blade::if('preference', function ($preference_name, $default_value) {
            return preference($preference_name, $default_value);
        });
        Blade::directive('setting', function ($setting_name) {
            return "<?php echo setting($setting_name) ?>";
        });
    }

    /**
     * Repository Binding.
     *
     * @return void
     */
    protected function repos()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(PreferenceRepositoryInterface::class, PreferenceRepository::class);
    }

    /**
     * Register Middlewares.
     *
     *@return void
     */
    protected function registerMiddleware()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('role', RoleMiddleware::class);
        $router->aliasMiddleware('bouncer', BouncerMiddleware::class);
    }

    /**
     * Register View Components.
     *
     *@return void
     */
    protected function registerComponents()
    {
        $this->loadViewComponentsAs('adminetic', [
            Sidebar::class,
            Action::class,
            Card::class,
            CreatePage::class,
            EditPage::class,
            IndexPage::class,
            ShowPage::class,
            EditAddButton::class,
        ]);
    }

    /**
     * Register Policies.
     *
     *@return void
     */
    protected function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    /**
     * Register Livewire Components.
     */
    protected function registerLivewire()
    {
        Livewire::component('admin.user.user-table', UserTable::class);
        Livewire::component('admin.user.user-preferences', UserPreferences::class);
        Livewire::component('admin.profile.edit-account', EditAccount::class);
        Livewire::component('admin.profile.edit-profile', EditProfile::class);
        Livewire::component('admin.activity.activity-table', ActivityTable::class);
        Livewire::component('admin.role.acl-panel', AclPanel::class);
        Livewire::component('admin.role.bread', Bread::class);
    }

    /**
     * Facades.
     */
    protected function getFacades()
    {
        $this->app->bind('adminetic', function ($app) {
            return new Adminetic();
        });
    }
}
