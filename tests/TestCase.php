<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use JovertPalonpon\Laradash\LaradashServiceProvider;
use Orchestra\Testbench\TestCase as Testbench;

class TestCase extends Testbench
{
    use RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [
            LaradashServiceProvider::class,
        ];
    }
}
