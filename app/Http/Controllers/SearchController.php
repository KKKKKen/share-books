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

        // ↓一覧表示
        // $posts = $query->orderBy('created_at', 'desc')->paginate(5);
        $posts = $query->orderBy('created_at', 'desc')->with(['user:id,name', 'favorites', 'comments'])->paginate(5);
        // ↑ N+1問題 homeと全く同じ

        // $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // ::使うのはいつ？？

        return view('home', compact('posts', 'keyword'));
    }
}
