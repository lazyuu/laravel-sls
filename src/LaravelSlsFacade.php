<?php

namespace Lazy\LaravelSls;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lazy\LaravelSls\Skeleton\SkeletonClass
 */
class LaravelSlsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-sls';
    }
}
