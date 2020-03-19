<?php

namespace JovertPalonpon\Laradash\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the Laradash dashboard.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Home');
    }
}
