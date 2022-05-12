<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(5)->create();
        foreach ($users as $user) {
            $user->image()->save(Image::factory()->make());
        }

        $posts = Post::factory(10)->create();
        foreach ($posts as $post) {
            $post->image()->save(Image::factory()->make());
        }

        Comment::factory(10)->create();
    }
}
