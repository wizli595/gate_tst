<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach ($users as  $user) {
            $posts =$user->posts();
            $posts->each(function ($post)  {
                    $comments = Comment::factory()->count(2)->make();
                    $comments->each(function ($comment) use ($post) {
                        $comment->user_id = $post->user_id;
                    });
                    $post->comments()->saveMany($comments);
            });
        }

    }
}
