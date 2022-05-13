<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        if (isset($_GET['search']))
         {
            return view('users.index', ['users' => User::where('name', 'LIKE', '%' . $_GET['search'] . '%')->paginate(10)]);
         }
        
    }


    public function create()
    {
        // return view('users.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user, 'posts' => Post::where('user_id', $user->id)->withCount('comment')->paginate(10)]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $validated = $request->validated();
        $user->fill($validated);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('user-profiles');

            if ($user->image) {
                Storage::delete($user->image->path);
                $user->image->path = $path;
                $user->image->save();
            } else {
                $user->image()->save(
                    Image::make(['path' => $path])
                );
            }
        }

        $user->save();
        return redirect()->route('users.show', [$user])->with('success', 'Profile updated successfully.');
    }

    public function destroy(User $user)
    {
        //
    }
}
