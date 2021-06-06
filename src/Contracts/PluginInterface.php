<?php

namespace Pratiksh\Adminetic\Contracts;

interface PluginInterface
{
    public function assets(): array;

    public function myMenu(): array;
}
