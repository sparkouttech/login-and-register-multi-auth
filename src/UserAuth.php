<?php

namespace Sparkouttech\UserAuth;

use Illuminate\Support\Facades\Auth;


class UserAuth
{
    // Build your next great package.
    public static function User()
    {
        return Auth::user();
    }

    public static function getId()
    {
        return Auth::id();
    }

    public static function getToken()
    {
        return Auth::user()->authentication_token;
    }
}
