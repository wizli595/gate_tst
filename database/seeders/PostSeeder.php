<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $users->each(function ($user) {
            $posts = \App\Models\Post::factory()->count(5)->make();
            $user->posts()->saveMany($posts);
            $posts->each(function ($post) {
                $comments = \App\Models\Comment::factory()->count(5)->make();

                $comments->each(function ($comment) use ($post) {
                    $comment->user_id = $post->user_id;
                });

                $post->comments()->saveMany($comments);
                
                $likes = \App\Models\Like::factory()->count(5)->make();
                $likes->each(function ($like) use ($post) {
                    $like->user_id = $post->user_id;
                });
                $post->likes()->saveMany($likes);
            });
        });
    }
}
