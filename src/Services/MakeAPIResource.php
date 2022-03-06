<?php

namespace Pratiksh\Adminetic\Services;

use Illuminate\Support\Str;
use Pratiksh\Adminetic\Services\Helper\CommandHelper;

class MakeAPIResource extends CommandHelper
{
    public static function makeRestAPI($name, $path)
    {
        // Making API Resource Controller
        self::makeRestAPIController($name, $path);
    }

    public static function makeClientAPI($name, $path)
    {
        self::makeClientAPIResource($name, $path);
    }

    public static function makeAPI($name, $path)
    {
        // Making Resource and Collection
        self::makeAPIResource($name, $path);
        // Making Resource API Controller
        self::makeClientAPIResource($name, $path);
        // Making Client API Controller
        self::makeRestAPIController($name, $path);
    }

    /**
     * Make API Resourceful Controller.
     */
    protected static function makeRestAPIController($name, $path)
    {
        if (! file_exists($dir_path = app_path('Http/Controllers/Admin/API/Restful'))) {
            mkdir($dir_path, 0777, true);
        }

        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelPath}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                $path,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('API/Restful/RestAPIController')
        );
        file_put_contents(app_path("/Http/Controllers/Admin/API/Restful/{$name}RestAPIController.php"), $controllerTemplate);
    }

    /**
     * Make Client API Resource.
     */
    protected static function makeClientAPIResource($name, $path)
    {
        // Making API Resource
        self::makeAPIResource($name, $path);
        // Making Controller
        if (! file_exists($dir_path = app_path('Http/Controllers/Admin/API/Client'))) {
            mkdir($dir_path, 0777, true);
        }
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelPath}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                $path,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('API/Client/ClientAPIController')
        );
        file_put_contents(app_path("/Http/Controllers/Admin/API/Client/{$name}ClientAPIController.php"), $controllerTemplate);
    }

    protected static function makeAPIResource($name, $path)
    {
        if (! file_exists($dir_path = app_path("/Http/Resources/{$name}"))) {
            mkdir($dir_path, 0777, true);
        }
        // Making Collection
        $collectionTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelPath}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                $path,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('API/Collection')
        );
        file_put_contents(app_path("/Http/Resources/{$name}/{$name}Collection.php"), $collectionTemplate);

        // Making Resource
        $resourceTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelPath}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                $path,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('API/Resource')
        );
        file_put_contents(app_path("/Http/Resources/{$name}/{$name}Resource.php"), $resourceTemplate);
    }
}
