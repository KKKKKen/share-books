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
            'user_id' =>auth()->user()->id,
            // 'user_id' => Auth()->user()->id;
            'post_id' => $request->post_id,
        ]);

        return back()->with('message', 'コメントしました');
    }

    // int $id,一旦消した
    public function destroy(Post $post,  Comment $comment)
    {
        $this->authorize('delete', $comment);

        $id = $comment->id;

        $one_comment = $post->comments()->find($id);
        // dd($one_coment);
        $one_comment->delete();
        return redirect()->route('home')->with('message', '投稿を削除しました');
    }

}
