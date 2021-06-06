<?php

namespace Pratiksh\Adminetic;

use Pratiksh\Adminetic\Providers\AdmineticServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            AdmineticServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
