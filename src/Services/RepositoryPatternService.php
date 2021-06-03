<?php

namespace Pratiksh\Adminetic\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Pratiksh\Adminetic\Services\Helper\CommandHelper;

class RepositoryPatternService extends CommandHelper
{
    public static function ImplementNow($name, $makeRequest = false)
    {
        if (! file_exists($repository_path = app_path('/Repositories'))) {
            mkdir($repository_path, 0777, true);
        }
        if (! file_exists($contract_path = app_path('/Contracts'))) {
            mkdir($contract_path, 0777, true);
        }

        self::MakeInterface($name);
        self::MakeRepositoryClass($name);
        if ($makeRequest) {
            self::makeRequest($name);
        }
    }

    protected static function MakeInterface($name)
    {
        $template = str_replace(
            [
                '{{modelName}}',
                '{{modelNameLowerCase}}',
                '{{modelNamePluralLowerCase}}',
            ],
            [
                $name,
                strtolower($name),
                strtolower(Str::plural($name)),
            ],

            self::getStub('RepositoryInterface')
        );

        file_put_contents(app_path("/Contracts/{$name}RepositoryInterface.php"), $template);
    }

    protected static function MakeRepositoryClass($name)
    {
        $template = str_replace(
            [
                '{{modelName}}',
                '{{modelNameLowerCase}}',
                '{{modelNamePluralLowerCase}}',
            ],
            [
                $name,
                strtolower($name),
                strtolower(Str::plural($name)),
            ],
            self::getStub('Repository')
        );

        file_put_contents(app_path("/Repositories/{$name}Repository.php"), $template);
    }

    protected static function makeRequest($name)
    {
        Artisan::call('make:request '.$name.'Request');
    }
}
