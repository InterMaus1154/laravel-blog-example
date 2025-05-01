<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    // index dashboard page
    public function index()
    {
        $posts = Post::with(['author', 'category'])
            ->orderByDesc('created_at')
            ->select(['post_title', 'post_excerpt', 'post_body', 'created_at', 'post_id'])
            ->paginate(10);
        return view('dashboard.index', compact('posts'));
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
