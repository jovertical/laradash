<?php


use Illuminate\Support\Facades\Route;
use JovertPalonpon\Laradash\Http\Middleware\Authenticate;
use JovertPalonpon\Laradash\Http\Middleware\RedirectIfAuthenticated;

Route::namespace('Auth')->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::prefix('password')->name('password.')->group(function () {
            Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('request');
            Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
            Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('reset');
            Route::post('reset', 'ResetPasswordController@reset')->name('update');
        });
    });

    Route::post('/logout', 'LoginController@logout')
        ->middleware(Authenticate::class)
        ->name('logout');
});

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index')->name('settings');
});
