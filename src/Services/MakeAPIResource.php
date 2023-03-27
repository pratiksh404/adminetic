<?php

namespace Pratiksh\Adminetic\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Pratiksh\Adminetic\Services\Helper\CommandHelper;

class MakeAPIResource extends CommandHelper
{
    public static function makeRestAPI($name, $path, $version = 'v1')
    {
        // Making API Resource Controller
        self::makeRestAPIController($name, $path, $version);
    }

    public static function makeClientAPI($name, $path, $version = 'v1')
    {
        self::makeClientAPIResource($name, $path, $version);
    }

    public static function makeAPI($name, $path, $version = 'v1')
    {
        // Making Resource and Collection
        self::makeAPIResource($name, $path, $version);
        // Making Resource API Controller
        self::makeClientAPIResource($name, $path, $version);
        // Making Client API Controller
        self::makeRestAPIController($name, $path, $version);
    }

    /**
     * Make API Resourceful Controller.
     */
    protected static function makeRestAPIController($name, $path, $version)
    {
        $version = ucfirst($version);
        $version_lc = strtolower($version);
        $swagger_json_content = self::generateSwaggerJsonContentContent($name)['content'];
        $required_fields = self::generateSwaggerJsonContentContent($name)['required_fields'];
        if (! file_exists($dir_path = app_path('Http/Controllers/Api/'.trim($version).'/Restful'))) {
            mkdir($dir_path, 0777, true);
        }

        // Making API Resource
        self::makeAPIResource($name, $path, $version);

        $controllerTemplate = str_replace(
            [
                '{{version}}',
                '{{version_lc}}',
                '{{modelName}}',
                '{{modelPath}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
                '{{swagger_json_content}}',
                '{{required_fields}}',
            ],
            [
                $version,
                $version_lc,
                $name,
                $path,
                strtolower(Str::plural($name)),
                strtolower($name),
                $swagger_json_content,
                $required_fields,
            ],
            self::getStub('Api/Restful/RestAPIController')
        );
        file_put_contents(app_path('/Http/Controllers/Api/'.trim($version)."/Restful/{$name}RestAPIController.php"), $controllerTemplate);

        $route = strtolower($name);
        file_put_contents('routes/api.php', "\n", FILE_APPEND | LOCK_EX);
        file_put_contents('routes/api.php', "Route::get('{$route}/all',[{$name}RestAPIController::class,'all'])->name('{$route}.all'); \n", FILE_APPEND | LOCK_EX);
        file_put_contents('routes/api.php', "Route::post('{$route}/get',[{$name}RestAPIController::class,'get'])->name('{$route}.get'); \n", FILE_APPEND | LOCK_EX);
        file_put_contents('routes/api.php', "Route::apiResource('{$route}',{$name}RestAPIController::class); \n", FILE_APPEND | LOCK_EX);
    }

    /**
     * Make Client API Resource.
     */
    protected static function makeClientAPIResource($name, $path, $version)
    {
        $version = ucfirst($version);
        $version_lc = strtolower($version);
        // Making API Resource
        self::makeAPIResource($name, $path, $version);
        // Making Controller
        if (! file_exists($dir_path = app_path('Http/Controllers/Api/'.trim($version).'/Client'))) {
            mkdir($dir_path, 0777, true);
        }
        $controllerTemplate = str_replace(
            [
                '{{version}}',
                '{{version_lc}}',
                '{{modelName}}',
                '{{modelPath}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $version,
                $version_lc,
                $name,
                $path,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('Api/Client/ClientAPIController')
        );
        file_put_contents(app_path('/Http/Controllers/Api/'.trim($version)."/Client/{$name}ClientAPIController.php"), $controllerTemplate);
    }

    protected static function makeAPIResource($name, $path, $version)
    {
        $version = ucfirst($version);
        $version_lc = strtolower($version);
        if (! file_exists($dir_path = app_path("/Http/Resources/{$version}/{$name}"))) {
            mkdir($dir_path, 0777, true);
        }
        // Making Collection
        $collectionTemplate = str_replace(
            [
                '{{version}}',
                '{{version_lc}}',
                '{{modelName}}',
                '{{modelPath}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $version,
                $version_lc,
                $name,
                $path,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('Api/Collection')
        );
        file_put_contents(app_path("/Http/Resources/{$version}/{$name}/{$name}Collection.php"), $collectionTemplate);

        // Making Resource
        $resourceTemplate = str_replace(
            [
                '{{version}}',
                '{{modelName}}',
                '{{modelPath}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $version,
                $name,
                $path,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            self::getStub('Api/Resource')
        );
        file_put_contents(app_path("/Http/Resources/{$version}/{$name}/{$name}Resource.php"), $resourceTemplate);
    }

    private static function generateSwaggerJsonContentContent($name)
    {
        $table = strtolower(Str::plural($name));

        $columns = DB::select(DB::raw('SHOW COLUMNS FROM `'.$table.'`'));

        $fields = [];

        $required_fields = [];

        $swagger_json_content = [];

        foreach ($columns as $column) {
            if (! is_null($column)) {
                $null = $column->Null == 'No' ? 'true' : 'false';
                $field_name = $column->Field;
                $field_type = $column->Type;
                $field_default = $column->Default;
                $example = DB::table($table)->count() > 0 ? DB::table($table)->first()->$field_name : '';
                if (! in_array($field_name, ['created_at', 'updated_at']) && ! in_array($field_type, ['longtext'])) {
                    if ($null != 'No') {
                        $required_fields[] = '"'.$field_name.'"';
                    }
                    $fields[] = [
                        'field_name' => $field_name,
                        'field_type' => $field_type,
                        'field_default' => $field_default,
                    ];
                    $swagger_json_content[] = '@OA\Property(property="'.$field_name.'",nullable='.$null.',type="'.$field_type.'",default="'.$field_default.'",example="'.$example.'")';
                }
            }
        }

        return [
            'required_fields' => implode(',', $required_fields),
            'content' => implode(',', $swagger_json_content),
        ];
    }
}
