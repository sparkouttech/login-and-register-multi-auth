<?php

use Illuminate\Support\Facades\Route;

use Sparkouttech\UserMultiAuth\App\Http\Controllers\LoginController;
use Sparkouttech\UserMultiAuth\App\Http\Controllers\RegisterController;
use Sparkouttech\UserMultiAuth\App\Http\Controllers\ForgetPasswordController;
use Sparkouttech\UserMultiAuth\App\Http\Controllers\HomeController;

Route::group(['middleware' => 'web'], function() {
    //All the routes that belongs to the group goes here
    Route::group(['prefix' => '/auth/user/'], function() {
    Route::get('login', [LoginController::class, 'login'])->name('userAuth.login.page');
    Route::get('login/resend/{id}', [LoginController::class, 'resendlogin']);
    Route::post('login', [LoginController::class, 'doLogin'])->name('userAuth.login');
    Route::get('register', [RegisterController::class, 'register'])->name('userAuth.register.page')->middleware('userguest');
    Route::get('phone_number', [LoginController::class, 'mobileLogin'])->name('userAuth.phone_number');
    Route::get('update-verification-status/{id}',[RegisterController::class, 'verifyUser'])->name('userAuth.verify');
    Route::post('register', [RegisterController::class, 'doRegister'])->name('userAuth.register');
    Route::get('forget-password', [ForgetPasswordController::class, 'forgetPasswordPage'])->name('userAuth.forgetPasswordPage');
    Route::post('check-email', [ForgetPasswordController::class, 'checkEmail'])->name('userAuth.check-email');
    Route::get('reset-password/{id}', [ForgetPasswordController::class, 'verifyPassword'])->name('userAuth.reset-password');
    Route::post('set-password', [ForgetPasswordController::class, 'setPassword'])->name('set-password');
    });
    Route::get('/home', [HomeController::class, 'dashboard'])->name('userAuth.dashboard')->middleware('userauth');

    Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

});
