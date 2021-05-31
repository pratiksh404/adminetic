<?php

namespace Pratiksh\Adminetic\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Pratiksh\Adminetic\Services\Helper\CommandHelper;

class MakeAPIResource extends CommandHelper
{
    public static function makeRestAPI($name)
    {
        // Making API Resource Controller
        self::makeRestAPIController($name);
    }

    public static function makeClientAPI($name)
    {
        self::makeClientAPIResource($name);
    }

    public static function makeAPI($name)
    {
        // Making Resource and Collection
        self::makeResource($name);
        // Making API Resource Controller
        self::makeAPIController($name);
    }

    /**
     *
     * Make Resource and Collection
     *
     */
    protected static function makeResource($name)
    {
        Artisan::call('make:resource ' . $name . 'Resource');
        Artisan::call('make:resource ' . $name . '/' . $name . 'Collection');
    }

    /**
     *
     * Make API Resourceful Controller
     *
     */
    protected static function makeRestAPIController($name)
    {
        $lowername = strtolower($name);
        if (!file_exists($path = app_path('Http/Controllers/Admin/API/Restful'))) {
            mkdir($path, 0777, true);
        }

        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            self::getStub('RestAPIController')
        );
        file_put_contents(app_path("/Http/Controllers/Admin/API/Restful/{$name}ApiController.php"), $controllerTemplate);
    }

    /**
     *
     * Make API Resourceful Controller
     *
     */
    protected static function makeAPIController($name)
    {
        $lowername = strtolower($name);
        if (!file_exists($path = app_path('Http/Controllers/Admin/API'))) {
            mkdir($path, 0777, true);
        }
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            self::getStub('APIController')
        );
        file_put_contents(app_path("/Http/Controllers/Admin/API/{$name}ApiController.php"), $controllerTemplate);
    }

    /**
     *
     * Make Client API Resource
     *
     */
    protected static function makeClientAPIResource($name)
    {
        if (!file_exists($path = app_path("/Http/Resources/Client/{$name}"))) {
            mkdir($path, 0777, true);
        }
        // Making Collection
        $clientCollectionTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            self::getStub('API/Client/Collection')
        );
        file_put_contents(app_path("/Http/Resources/Client/{$name}/{$name}Collection.php"), $clientCollectionTemplate);

        // Making Resource
        $clientResourceTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            self::getStub('API/Client/Resource')
        );
        file_put_contents(app_path("/Http/Resources/Client/{$name}/{$name}Resource.php"), $clientResourceTemplate);

        // Making Controller
        if (!file_exists($path = app_path('Http/Controllers/API'))) {
            mkdir($path, 0777, true);
        }
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            self::getStub('API/Client/APIController')
        );
        file_put_contents(app_path("/Http/Controllers/API/{$name}ApiController.php"), $controllerTemplate);
    }
}
