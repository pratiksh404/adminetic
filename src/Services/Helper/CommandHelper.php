<?php

namespace Pratiksh\Adminetic\Services\Helper;

class CommandHelper
{
    protected static function getStub($type)
    {
        return file_get_contents(__DIR__."/../../Console/Commands/AdminStubs/$type.stub");
    }
}
