<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use JovertPalonpon\Laradash\Http\Middleware\Authenticate;
use Laravel\Ui\AuthRouteMethods;

Route::mixin(new AuthRouteMethods);
Auth::routes(['register' => false]);

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index')->name('settings');
});
