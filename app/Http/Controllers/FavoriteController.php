<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    //
    public function store(Request $request, Favorite $favorite, Post $post)
    {
            $favorite->user_id = Auth::user()->id;
            $favorite->post_id = $post->id;
            $favorite->save();

        return redirect()->route('home')->with('message', 'お気に入り登録しました');
    }
    public function destroy(Favorite $favorite, Post $post)
    {
        // $a = $post->favorites();
        // dd($a);
        $post->favorites()->delete();
        return redirect()->route('home')->with('message', 'お気に入りを解除しました');
        // return back()->with('message', 'お気に入りを解除しました');
    }

}
