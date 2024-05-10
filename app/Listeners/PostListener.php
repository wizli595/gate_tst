<?php

namespace App\Listeners;

use App\Events\PostEvent;
use App\Models\User;
use App\Notifications\PostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostEvent $event): void
    {
        // if($event->post){
        //     $user= User::find($event->post['user_id']);
        //     $user->notify(new PostNotification($event->post));
        // }
        $post = $event->post;
        $method = request()->method();
       if($post->user->email){
           $event->post->user->notify(new PostNotification($event->post,$method));
       }
        // dd($event);
    }
}
