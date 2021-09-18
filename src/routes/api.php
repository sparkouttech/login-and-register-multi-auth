<?php

use Illuminate\Support\Facades\Route;

use Sparkouttech\UserMultiAuth\App\Http\Controllers\LoginController;
use Sparkouttech\UserMultiAuth\App\Http\Controllers\RegisterController;
use Sparkouttech\UserMultiAuth\App\Http\Controllers\ForgetPasswordController;

Route::group(['prefix' => 'api','middleware' => ['cors', 'json']], function() {
    //All the routes that belongs to the group goes here
    Route::post('/auth/user/login', [LoginController::class, 'doLogin'])->name('api.login');
    Route::post('/auth/user/register', [RegisterController::class, 'doRegister'])->name('api.register');
    Route::post('/auth/user/check-email', [ForgetPasswordController::class, 'checkEmail'])->name('api.check-email');
});
