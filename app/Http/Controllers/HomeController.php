<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index(){
        // userと絡めないのは全部のpostを表示したいからかな
        // $posts = Post::all();
        // ではなく
        $posts = Post::orderBy('created_at', 'desc')->get();
        // ::使うのはいつ？？

        // ↓何？
        // $user = auth::user();
        return view('home', compact('posts'));
        // userを本来なら渡している

    }
    public function mypost()
    {
        $user = Auth()->user()->id;
        $posts = Post::where('user_id', $user)->orderBy('created_at', 'asc')->get();
        return view('mypost', compact('posts'));
    }
}
