@extends('layouts.app')

@section('content')

<!-- カード -->
<div class="card mb-3 shadow">
      <div class="card-body d-flex flex-row">
      
     <div>
         
          <div class="font-weight-bold">
          <img src="{{ asset('/storage/avatar/'.($post->user->avatar ?? 'user_default.jpg')) }}" 
          class="rounded-circle" style="height:40px;width:40px;">
            {{ $post->user->name ?? '削除されたユーザー' }}さん

                        
          </div>

        
        <div class="d-flex float-end">
          <!-- 編集ボタン -->
        @can('update', $post)
        <span class="ml-auto">
        <a href="{{ route('post.edit', $post) }}">
        <button class="btn btn-primary">編集</button>
        </a>
        </span>
        @endcan
        
           <!-- 削除ボタン -->
        @can('delete', $post)
        <!-- <form method="post" action="{{route('post.destroy', $post)}}"> -->
        <form method="post" action="{{ route('post.destroy', $post) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onClick="return confirm('本当にいいの？');">削除</button>
        </form>
        @endcan
        
        </div>
    

          <div class="font-weight-lighter">
          {{ $post->created_at->format('Y/m/d G:i') }} 
          </div>
        </div>
      </div>
      <div class="card-body pt-0 pb-2">
<!-- 機能していない なくても表示される -->
        @if($post->image)
        <img src="{{ asset('storage/images/'.$post->image)}}" 
        class="img-fluid mx-auto d-block" style="height:300px;">
        @endif
        <h3 class="h4 card-title">
    『{{ $post->title }}』
        </h3>
        <div class="card-text">
          {{ $post->body }}
        </div>

<!-- コメント表示↓ -->
@if ($post->comments)
@foreach ($post->comments as $comment)
<div class="card mt-5 mb-4 shadow 
@if(auth()->id() == $comment->user_id)
border-brown
@endif
">
    <!-- 自分の投稿だったら枠で囲む↑ -->
<div class="card-header">
    <img src="{{ asset('/storage/avatar/'.$comment->user->avatar ?? 'user_default.jpg') }}"
    class="rounded-circle" style="width:40px;height:40px;">
    {{ $comment->user->name  ?? '削除されたユーザー'}} さん
</div>

    <div class="card-body">
        {{$comment->body}}

    </div>
    <div class="card-footer">
    @can('delete', $comment)

 <!-- 引数は$comment->idでも$commentでもよい -->
    <form method="post" action="{{ route('comment.destroy', [$post, $comment->id]) }}"
        class="d-inline">
    @method('delete')    
    @csrf
    <button type="submit" class="btn btn-info" onclick="return confirm('本当に削除しても大丈夫ですか？');">削除</button>
    </form>
    @endcan

    
        <span class="mr-2">
            投稿日時 {{$comment->created_at->diffForHumans()}}
        </span>
    </div>
<!-- 削除ボタン↓ -->


</div>
@endforeach
@endif

<!-- コメントエラーメッセージ↓ -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- コメント投稿用フォーム↓ -->
<div class="card mb-4">
    <form method="post" action="{{route('comment.store', $post)}}">
        @csrf
        <input type="hidden" name='post_id' value="{{$post->id}}">
        <div class="form-group">
            <textarea name="body" class="form-control" id="body" cols="30" rows="5" 
            placeholder="コメントを入力する">{{old('body')}}</textarea>
        </div>
        <div class="form-group link-hover">
        <button class="btn btn-brown text-light mt-3 float-right mb-3 mr-3 ">コメントする</button>
        </div>
    </form>
</div>




       </div>  
</div>

<!-- ↑ -->

















</div>

@endsection