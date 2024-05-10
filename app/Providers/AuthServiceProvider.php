<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Comment;
use App\Models\Post;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        // Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::before(function ($user) {
        //    return boolval($user->is_admin);
        // });
        // Gate::define("index",function ($user){
        //     return $user;
        // });
        // Gate::define('show',function ($user){
        //     return true;
        // });

        // Gate::define('create',function ($user){
        //     return $user ;
        // });
        // Gate::define('update',function ($user){
        //     return $user->role === "user" ;
        // });
        // Gate::define('delete',function ($user){
        //     return $user->role === "user" ;
        // });
        // Gate::before(function ($user)  {
        //     return $user->isEditor();
        // });



    }
}
