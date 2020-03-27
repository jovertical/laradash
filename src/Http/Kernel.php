<?php

namespace JovertPalonpon\Laradash\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use JovertPalonpon\Laradash\Http\Middleware\Authenticate;
use JovertPalonpon\Laradash\Http\Middleware\RedirectIfAuthenticated;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'laradash.auth' => Authenticate::class,
        'laradash.guest' => RedirectIfAuthenticated::class,
    ];
}
