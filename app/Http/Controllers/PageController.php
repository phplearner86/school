<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        //Authenticate
        $this->middleware('auth')->only('home');
        
        // Authorize
       $this->authorizeResource(User::class);
    }

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

    public function settings(User $user)
    {
        return view('pages.settings', compact('user'));
    }

    protected function resourceAbilityMap()
    {
        return [
        'dashboard' => 'touch',
        'settings' => 'updateAccount',
        ];
    }
}
