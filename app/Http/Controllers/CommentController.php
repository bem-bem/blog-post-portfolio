<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     public function storeComment(Request $request,  $id)
    {
        $post = Post::findOrFail($id);
        $post->comment()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id,
        ]);
         return back()->with('success','Commented succesfully.');
    }

}
