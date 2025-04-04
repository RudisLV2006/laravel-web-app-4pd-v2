<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){
        // \Log::debug("i am here");
        $comments = Comment::with("post")->get();
        return view('comment.comment_index', ["comments"=>$comments]);
    }
    public function store(Request $request, Post $post)
    {  
        \Log::debug($request);
        $request->validate([
            'content' => 'required|string'
        ]);

        $request->user()->comments()->create(
            [
                "content"=>$request->content,
                "post_id"=>$post->id
            ]
        );

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function delete(Comment $comments){
        
    }
}
