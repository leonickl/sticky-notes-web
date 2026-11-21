<?php

namespace App\Controllers;

use PXP\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return auth()
            ? redirect('notes')
            : redirect('home');
    }

    public function home()
    {
        return view('home');
    }
}
