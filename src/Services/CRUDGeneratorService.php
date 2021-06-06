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
        $edit_add_file = resource_path("views/admin/layouts/modules/{$lowername}/edit_add.blade.php");
        file_put_contents(resource_path("views/admin/layouts/modules/{$lowername}/edit_add.blade.php"), '');
        self::fileMadeSuccess($console, $edit_add_file, 'Edit add extended file');

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

    protected static function fileMadeSuccess($console, $file, $type)
    {
        if (file_exists($file)) {
            $console->info($type.' created successfully ... ✅');
        } else {
            $console->error('Failed to create '.$type.' ...');
        }
    }
}
