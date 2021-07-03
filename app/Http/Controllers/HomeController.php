<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Favorite;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

class HomeController extends Controller
{
    //
    public function index(){
        // userと絡めないのは全部のpostを表示したいからかな
        // $posts = Post::all();
        // ではなく
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // N＋一問題↓10query
        $posts = Post::orderBy('created_at', 'desc')->with(['user:id,name,avatar', 'favorites', 'comments'])->paginate(5);
        // $posts = Post::orderBy('created_at', 'desc')->with(['user:id,name', 'favorites:id,post_id', 'comments'])->paginate(5);

        return view('home', compact('posts'));
    }
    public function myposts()
    {
        // Auth::id() = Auth::user()->id = Auth::id()
        // $user = Auth()->user()->id;
        $user = Auth::id();

        $posts = Post::where('user_id', $user)->paginate(5);
        $posts = Post::where('user_id', $user)->with(['user:id,name,avatar', 'favorites', 'comments'])->orderBy('created_at', 'desc')->paginate(5);
        
        // $posts = Post::where('user_id', $user)->orderBy('created_at', 'asc')->get();
        return view('myposts', compact('posts', 'user'));
    }
    public function mycomments()
    {
        $user = Auth()->user()->id;
        $comments = Comment::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(5);
        $comments = Comment::where('user_id', $user)->with(['post.user:id,name,avatar', 'post:id,created_at,title,body', 'post.favorites', 'post.comments'])->orderBy('created_at', 'desc')->paginate(5);
        
        return view('mycomments', compact('comments'));
    }

    public function myfavorites()
    {
        $user = auth()->id();
        // ログイン中でfavoritesのpost_id
        // $favorites = Favorite::where('user_id', $user)->paginate('post_id');
        $favorites = Favorite::where('user_id', $user)->get('post_id');
        // $favorites = Favorite::where('user_id', $user)->with(['post.user:id,name', 'post:created_at,user_id,title'])->get('post_id');
        // ↑まさかの変わらない

        // dd($favorites);
        $posts = Post::find($favorites);
        $posts = Post::with(['user:id,name', 'favorites', 'comments'])->find($favorites);
        // $posts = Post::with(['user:id,name', 'favorites', 'comments'])->find($favorites);
        
// ↑実験
        // 動く↓
        // $user = Auth::id();
        // $favorites = Favorite::where('user_id', $user)->get('post_id');
        // $posts = Post::find($favorites);
        // 動く↑
        return view('myfavorites', compact('posts'));
    }
}
