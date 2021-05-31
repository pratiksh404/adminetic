<?php

namespace Pratiksh\Adminetic\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pratiksh\Adminetic\Skeleton\SkeletonClass
 */
class AdmineticFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'adminetic';
    }
}
