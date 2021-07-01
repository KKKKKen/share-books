@extends('layouts.app')

@section('content')

<!-- カード -->
<div class="card mb-3 shadow">
      <div class="card-body d-flex justify-content-between">
      
     <div>
         
          <div class="font-weight-bold">
          <img src="{{ asset('/storage/avatar/'.($post->user->avatar ?? 'user_default.jpg')) }}" 
          class="rounded-circle" style="height:40px;width:40px;">
            {{ $post->user->name ?? '削除されたユーザー' }}さん

                        
          </div>

        

    

          <div class="font-weight-lighter">
          {{ $post->created_at->format('Y/m/d G:i') }} 
          </div>
        </div>

                <!-- お気に入りアイコン↓ -->  
                <div class="">     
        @if(Auth::check())
        @if($post->favorites->count() == 0)
        <form method="post" action="{{ route('favorite.store', $post) }}">
            @csrf  
            <button class="clear-decoration">
            <i class="fas fa-bookmark fa-2x gray hover"></i>
          </button class="clear-decoration">
        </form>
        @endif
        <!-- 削除 -->
        @if($post->favorites->count())
        <form method="post" action="{{ route('favorite.destroy', $post) }}">
            @csrf  
            @method('delete')
            <button class="clear-decoration">
              <i class="fas fa-bookmark fa-2x yellow hover"></i>
            <!-- <i class="fa-solid fa-heart m-0 p-1 {{ $post->favorite == null ? 'bg-brown': '' }}"></i> -->
          </button>
        </form>
        @endif
        @endif
        <!-- お気に入りアイコン↑ --> 


          <!-- dropdown -->
          @if($post->user_id == Auth::id())
          <div class="ml-auto card-text float-end text-end">
            <div class="dropdown">

              <button class="btn dropdown" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-ellipsis-v"></i></button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('post.edit', $post) }}">
                  <i class="fas fa-pen mr-1"></i>記事を更新する
                </a>
                <div class="dropdown-divider"></div>
                <!-- aタグにかいてある↓ -->
                <!-- data-toggle="modal" data-target="#modal-delete-{{ $post->id }}" -->
                <a class="dropdown-item text-danger" href="#" id="destroy-post">
                  <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                </a>
<!-- ここにあったformの位置 -->
              </div>
              <form method="post" action="{{ route('post.destroy', $post) }}">
                @csrf
                @method('delete')
                <!-- <input type="hidden" id="destroy-post-form" onclick="return alert('OK’)"> -->
                <!-- <input type="submit" id="destroy-post-form" onclick="return alert('OK’)"> -->
                <button type="hidden" class="btn" id="destroy-post-form" onclick=" confirm('本当にいいの？');"></button>
                </form>
            </div>
          </div>
          @endif
          <!-- dropdown -->

<!-- ここかなドロップダウン↑ -->
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