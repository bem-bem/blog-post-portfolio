<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeInvoke extends Controller
{
    public function __invoke(Request $request)
    {
        return view('welcome', ['posts' => Post::with('user')->paginate(5)]);
    }
}
