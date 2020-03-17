<?php

namespace JovertPalonpon\Laradash\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class SettingsController extends Controller
{
    /**
     * Display the Laradash's settings.
     *
     * @return string
     */
    public function index()
    {
        return Inertia::render('Settings');
    }
}
