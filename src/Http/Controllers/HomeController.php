<?php

namespace JovertPalonpon\Laradash\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Display the Laradash's dashboard.
     *
     * @return string
     */
    public function index()
    {
        return 'Hello Laradash!';
    }
}
