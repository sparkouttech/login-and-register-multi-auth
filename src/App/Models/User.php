<?php

namespace Sparkouttech\UserMultiAuth\App\Models;

use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class User extends Authenticate
{
    use Notifiable;
    use \Sparkouttech\UserMultiAuth\App\Traits\Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string','email_verified_at' => 'datetime'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','authentication_token','phone_number','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
