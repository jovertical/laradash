<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laradash URI Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Laradash will be accessible from. Feel free
    | to change this path to anything you like.
    |
    */

    'path' => env('LARADASH_PATH', 'laradash'),

    /*
    |--------------------------------------------------------------------------
    | Laradash Master Switch
    |--------------------------------------------------------------------------
    |
    | This option may be used to unregister the commands, routes that Laradash
    | provides for your Laravel application.
    |
    */

    'enabled' => env('LARADASH_ENABLED', true),
];
