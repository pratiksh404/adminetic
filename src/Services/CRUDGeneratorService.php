<?php

namespace Pratiksh\Adminetic\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Pratiksh\Adminetic\Services\Helper\CommandHelper;

class CRUDGeneratorService extends CommandHelper
{
    public static function makeCRUD($name, $console)
    {
        self::makeController($name, $console);
        self::makeModel($name, $console);
        self::makeViews($name, $console);
        self::makeOthers($name, $console);
        self::addFileContent($name, $console);
    }

    // Make Controller
    protected static function makeController($name, $console)
    {
        if (! file_exists($path = app_path('/Http/Controllers/Admin'))) {
            mkdir($path, 0777, true);
        }
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('Controller')
        );
        $file = app_path("/Http/Controllers/Admin/{$name}Controller.php");
        file_put_contents(app_path("/Http/Controllers/Admin/{$name}Controller.php"), $controllerTemplate);
        self::fileMadeSuccess($console, $file, 'Controller');
    }

    // Make Model
    protected static function makeModel($name, $console)
    {
        if (! file_exists($path = app_path('/Models/Admin'))) {
            mkdir($path, 0777, true);
        }
        $modelTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('Model')
        );
        $file = app_path("/Models/Admin/{$name}.php");
        file_put_contents(app_path("/Models/Admin/{$name}.php"), $modelTemplate);
        self::fileMadeSuccess($console, $file, 'Model');
    }

    // Make View
    protected static function makeViews($name, $console)
    {
        $lowername = strtolower($name);
        if (! file_exists($path = resource_path('views/admin/'.$lowername))) {
            mkdir($path, 0777, true);
        }

        if (! file_exists($path = resource_path('views/admin/layouts/modules/'.$lowername))) {
            mkdir($path, 0777, true);
        }

        self::makeIndexView($name, $lowername, $console);
        self::makeCreateView($name, $lowername, $console);
        self::makeEditView($name, $lowername, $console);
        self::makeShowView($name, $lowername, $console);
        self::createLayoutBlades($lowername, $console);
    }

    // Make Index View
    protected static function makeIndexView($name, $lowername, $console)
    {
        $modelTemplate = str_replace(
            [
                '{{modelNameSinglularLowerCase}}',
                '{{modelNamePluralLowerCase}}',
            ],
            [
                strtolower($name),
                strtolower(Str::plural($name)),
            ],
            self::getStub('CRUD/IndexView')
        );
        $file = resource_path("views/admin/{$lowername}/index.blade.php");
        file_put_contents(resource_path("views/admin/{$lowername}/index.blade.php"), $modelTemplate);
        self::fileMadeSuccess($console, $file, 'Index file');
    }

    // Make Create View
    protected static function makeCreateView($name, $lowername, $console)
    {
        $modelTemplate = str_replace(
            [
                '{{modelNameSinglularLowerCase}}',
            ],
            [
                strtolower($name),
            ],
            self::getStub('CRUD/CreateView')
        );

        $file = resource_path("views/admin/{$lowername}/create.blade.php");
        file_put_contents(resource_path("views/admin/{$lowername}/create.blade.php"), $modelTemplate);
        self::fileMadeSuccess($console, $file, 'Create file');
    }

    // Make Edit View
    protected static function makeEditView($name, $lowername, $console)
    {
        $modelTemplate = str_replace(
            [
                '{{modelNameSinglularLowerCase}}',
            ],
            [
                strtolower($name),
            ],
            self::getStub('CRUD/EditView')
        );

        $file = resource_path("views/admin/{$lowername}/edit.blade.php");
        file_put_contents(resource_path("views/admin/{$lowername}/edit.blade.php"), $modelTemplate);
        self::fileMadeSuccess($console, $file, 'Edit file');
    }

    // Make Show View
    protected static function makeShowView($name, $lowername, $console)
    {
        $modelTemplate = str_replace(
            [
                '{{modelNameSinglularLowerCase}}',
            ],
            [
                strtolower($name),
            ],
            self::getStub('CRUD/ShowView')
        );

        $file = resource_path("views/admin/{$lowername}/show.blade.php");
        file_put_contents(resource_path("views/admin/{$lowername}/show.blade.php"), $modelTemplate);
        self::fileMadeSuccess($console, $file, 'Show file');
    }

    // Make Layout Blades
    protected static function createLayoutBlades($lowername, $console)
    {
        $form_file = resource_path("views/admin/layouts/modules/{$lowername}/form.blade.php");
        file_put_contents(resource_path("views/admin/layouts/modules/{$lowername}/form.blade.php"), '');
        self::fileMadeSuccess($console, $form_file, 'Edit add extended file');

        $script_file = resource_path("views/admin/layouts/modules/{$lowername}/scripts.blade.php");
        file_put_contents(resource_path("views/admin/layouts/modules/{$lowername}/scripts.blade.php"), '');
        self::fileMadeSuccess($console, $script_file, 'Script file');
    }

    // Make Other neccesary CRUD files
    protected static function makeOthers($name, $console)
    {
        Artisan::call('make:migration create_'.strtolower(Str::plural($name)).'_table --create='.strtolower(Str::plural($name)));
        $console->info('Migration file created named create_'.strtolower(Str::plural($name)).'_table ... ✅');

        Artisan::call('make:seeder '.$name.'Seeder');
        $console->info('Seeder file created ... ✅');

        Artisan::call('make:repo '.$name);
        $console->info('Repository and Interface created ... ✅');

        Artisan::call('make:request '.$name.'Request');
        $console->info('Request file created ... ✅');
    }

    // Make Other Necessary CRUD Files
    protected static function addFileContent($name, $console)
    {
        // Adding Route
        $lowercased_name = strtolower($name);
        $route = "Route::resource('admin/{$lowercased_name}',\App\Http\Controllers\Admin\\{$name}Controller::class);";
        file_put_contents('routes/web.php', "\n", FILE_APPEND | LOCK_EX);
        file_put_contents('routes/web.php', $route, FILE_APPEND | LOCK_EX);

        $console->info('Route  added to web.php ... ✅');

        // Adding Route Interface Binding
        $repository_interface_binding = '$this->app->bind(\App\Contracts\\'.$name.'RepositoryInterface::class, \App\Repositories\\'.$name.'Repository::class);';
        $provider_path = app_path('Providers/AdminServiceProvider.php');
        putContentToClassFunction($provider_path, 'protected function repos', $repository_interface_binding);

        // Adding Module To Menu
        $menu_content = "],[\n".
            "'type' => 'menu',\n".
            "'name' => '$name',\n".
            "'icon' => 'fa fa-wrench',\n".
            "'is_active' => request()->routeIs('$lowercased_name*') ? 'active' : '',\n".
            "'conditions' => [\n".
            "[\n".
            "'type' => 'or',\n".
            "'condition' => auth()->user()->can('view-any', \App\Models\Admin\\".$name."::class),\n".
            "],\n".
            "[\n".
            "'type' => 'or',\n".
            "'condition' => auth()->user()->can('create', \App\Models\Admin\\".$name."::class),\n".
            "],\n".
            "],\n";
        $menu_content = $menu_content.'"children" => $this->indexCreateChildren("'.$lowercased_name.'", \App\Models\Admin\\'.$name.'::class),';
        $menu_content = "\n".$menu_content."\n";
        $menu_path = app_path('Services/MyMenu.php');
        putContentToClassFunction($menu_path, 'return [', $menu_content, ']');

        $console->info('Menu added to Menu.php ... ✅');
    }

    protected static function fileMadeSuccess($console, $file, $type)
    {
        if (file_exists($file)) {
            $console->info($type.' created successfully ... ✅');
        } else {
            $console->error('Failed to create '.$type.' ...');
        }
    }
}
