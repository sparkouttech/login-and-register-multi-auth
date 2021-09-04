<?php

namespace Sparkouttech\UserMultiAuth;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sparkouttech\UserMultiAuth\Skeleton\SkeletonClass
 */
class UserMultiAuthFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'user-auth';
    }
}
