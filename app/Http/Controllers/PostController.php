<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        //
        $inputs = $request->validate([
            'title' => 'required|max:225',
            'body' => 'required|max:225',
            'image' => 'image|max:1024',
        ]);

        if(request('image')){
            // アップロードした際にもともとのファイル名がなくなってしまうので
            // ファイル名を$nameに保存
            $original_name = request()->file('image')->getClientOriginalName();
            // $nameという名前で画像ファイルを保存するように指定

            $name = date("Ymd_His").'_'.$original_name;
            request()->file('image')->move('storage/images', $name);
            $post->image = $name;
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $post->user_id = 1;


        // todolistではuser_idを保存していなかった。一旦飛ばそう
        // $post->user_id = auth()->user()->id;
        $post->save();

        return back()->with('message', '投稿を作成しました');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
