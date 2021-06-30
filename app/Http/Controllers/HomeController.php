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
        $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // ::使うのはいつ？？

        // ↓何？
        // $user = auth::user();
        return view('home', compact('posts'));
        // userを本来なら渡している

    }
    public function myposts()
    {
        // Auth::id();は
        // $user = Auth()->user()->id;
        $user = Auth::id();

        $posts = Post::where('user_id', $user)->paginate(5);
        // $posts = Post::where('user_id', $user)->orderBy('created_at', 'asc')->get();
        return view('myposts', compact('posts', 'user'));
    }
    public function mycomments()
    {
        $user = Auth()->user()->id;
        $comments = Comment::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(5);
        return view('mycomments', compact('comments'));
    }


    
    public function myfavorites()
    {
        $user = auth()->id();
        // ログイン中でfavoritesのpost_id
        // $favorites = Favorite::where('user_id', $user)->paginate('post_id');
        $favorites = Favorite::where('user_id', $user)->get('post_id');

        // dd($favorites);
        $posts = Post::find($favorites);
// ↑実験
        // 動く↓
        // $user = Auth::id();
        // $favorites = Favorite::where('user_id', $user)->get('post_id');
        // $posts = Post::find($favorites);
        // 動く↑
        return view('myfavorites', compact('posts'));
    }
}
