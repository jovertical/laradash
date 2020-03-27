<?php


use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function () {
    Route::middleware('laradash.guest')->group(function () {
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
        ->middleware('laradash.auth')
        ->name('logout');
});

Route::middleware('laradash.auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index')->name('settings');
});
