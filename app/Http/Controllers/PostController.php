<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
       
        $post = Post::create($validated);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('post-thumbnails');
            $post->image()->save(
                Image::make(['path' => $path])
            );
        }

        return back()->with('success', 'New post has been created successfully.');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $validated = $request->validated();
        $post->fill($validated);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('post-thumbnails');

            if ($post->image) {
                Storage::delete($post->image->path);
                $post->image->path = $path;
                $post->image->save();
            } else {
                $post->image()->save(
                    Image::make(['path' => $path])
                );
            }
        }

        $post->save();
        return redirect()->route('users.show', [auth()->id()])->with('success', 'Post Updated successfully.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        Storage::delete($post->image->path);
        $post->delete();
        return back()->with('success', 'Post Deleted successfully.');
    }
}
