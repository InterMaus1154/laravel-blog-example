<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show a specific post by id
    public function show(Post $post)
    {
        // load relations if not already loaded
        $post->loadMissing(['author', 'category']);
        return view('post.show', compact('post'));
    }
}
