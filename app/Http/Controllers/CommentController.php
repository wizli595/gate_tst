<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        
        return view('comment.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Post $post)
    {
        $validated = $request->validate([
            'content' => 'required',
            'post_id' => 'required',
        ]);
        $validated['user_id'] = auth()->user()->id;
        if($post->id != $validated['post_id']){
            return redirect()->back();
        }
        Comment::create($validated);
        return redirect()->route('posts.index');
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);
        $comment->update($validated);
        return redirect()->route('posts.show', $comment->post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
