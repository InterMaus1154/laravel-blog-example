<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    // show a specific post by id
    public function show(Post $post)
    {
        // load relations if not already loaded
        $post->loadMissing(['author', 'category']);
        return view('post.show', compact('post'));
    }

    // delete a post by id
    public function delete(Post $post)
    {
        if(Gate::denies('delete', $post)){
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['auth_error' => 'You are unauthorised to delete this post!']);
        }
        try {
            $post->delete();
            return redirect()->route('dashboard.index')->with('success', 'Post successfully deleted!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['internal_error' => 'An unknown internal error occurred. Try again later or contact the administrator!']);
        }
    }
}
