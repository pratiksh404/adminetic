<?php

namespace Pratiksh\Adminetic\Services\Helper;

abstract class Adapter
{
    abstract public function headerData(): array;

    abstract public function footerData(): array;
}
