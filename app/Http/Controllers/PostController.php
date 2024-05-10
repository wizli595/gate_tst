<?php

namespace App\Http\Controllers;

use App\Events\PostEvent;
use App\Models\Post;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate incoming request data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);


            $data = [
                'title' => $validated['title'],
                'content' => $validated['content'],
                'user_id' => Auth::id(),
            ];


            $post = Post::create($data);
            $post->save();
            $e=new PostEvent($post);
            // dd($e);
            event($e);

        return redirect()->route('posts.show', $post);


    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $post->update($validated);
        event(new PostEvent($post));
        return redirect()->route('posts.show', $post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();
        event(new PostEvent($post));
        return redirect()->route('posts.index');
    }
    public function test(){
        $users = User::all();
        Notification::send($users, new TestNotification());
    }
}
