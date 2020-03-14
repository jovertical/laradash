<?php

namespace JovertPalonpon\Laradash\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the Laradash's dashboard.
     *
     * @return string
     */
    public function index()
    {
        return Inertia::render('Home');
    }
}
