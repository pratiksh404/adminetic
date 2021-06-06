<?php

namespace Pratiksh\Adminetic\Services\Helper;

abstract class Adapter
{
    abstract public function headerComponent(): array;

    abstract public function dashboardComponent(): array;
}
