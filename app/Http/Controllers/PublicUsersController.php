<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PublicUsersController extends Controller
{
    public function index()
    {
        return view('welcome', ['posts' => Post::with('user')->withCount('comment')->paginate(5)]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }
}
