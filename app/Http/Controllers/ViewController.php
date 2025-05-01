<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    // index dashboard page
    public function index()
    {
        return view('dashboard.index');
    }

    // show login page
    public function showLogin()
    {
        // if logged in, redirect to dashboard
        if (auth()->check()) return redirect()->route('dashboard.index');

        return view('auth.login');
    }

    // show registration page
    public function showRegister()
    {
        return view('auth.register');
    }
}
