<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=User::all();
        foreach ($users as  $user) {
            $posts=$user->posts();
            $posts->each(function ($post)  {
                $likes = Like::factory()->count(1)->make();
                $likes->each(function ($like) use ($post) {
                    $like->user_id = $post->user_id;
                });
                $post->likes()->saveMany($likes);
        });
        }

    }
}
