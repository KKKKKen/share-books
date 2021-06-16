<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentController extends Controller
{
    //

    public function store(Request $request, Post $post)
    {
        $inputs = $request->validate([
            'body' => 'required|max:5', 
        ]);
        $comment = Comment::Create([
            'body' => $inputs['body'],
            // userどうするか↓
            'user_id' =>1,
            'post_id' => $request->post_id,
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        $post->comments()->delete();
        return redirect()->route('home')->with('message', '投稿を削除しました');
    }

}
