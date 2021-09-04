<?php

namespace Sparkouttech\UserAuth;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sparkouttech\UserAuth\Skeleton\SkeletonClass
 */
class UserAuthFacade extends Facade
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
