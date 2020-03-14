<?php

namespace Tests\Http;

use Tests\TestCase;

class RouteTest extends TestCase
{
    public function test_route()
    {
        $this->get(config('laradash.path'))->assertSuccessful();
    }
}
