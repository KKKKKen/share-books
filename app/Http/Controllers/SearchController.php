<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        // キーワード受け取り
        $keyword = $request->input('keyword');
        
        // クエリ作成
       $query = Post::query();
        // もしキーワードがあったら
        if(!empty($keyword))
        {
             $query->where('title', 'like', '%'.$keyword.'%')
             ->orWhere('body', 'like', '%'.$keyword.'%')
             ->orWhere('created_at', 'like', '%'.$keyword.'%');
         }

// home
        // ↓一覧表示
        $posts = $query->orderBy('created_at', 'desc')->paginate();
        // $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // ::使うのはいつ？？

        // ↓何？
        // $user = auth::user();
        return view('home', compact('posts', 'keyword'));



    }
}
