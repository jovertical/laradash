<?php

namespace JovertPalonpon\Laradash\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class SettingsController extends Controller
{
    /**
     * Display Laradash settings.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Settings');
    }
}
