<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function home()
    {
        return view('pages.home');
    }

    public function index()
    {
        return view('pages.welcome');
    }
}
