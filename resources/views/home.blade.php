@extends('layouts.app')

@section('content')

@if(session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

@foreach($posts as $post)

<!-- カード -->
    <div class="card mb-3 shadow ">
      <!-- 下のclassにある d-flex flex-row -->
      <div class="card-body d-flex justify-content-between">
        <div>
          <div class="font-weight-bold">
            {{ $post->user->name ?? "削除されたユーザー"}}
          </div>
        <!-- アバター -->
        <img src="{{asset('storage/avatar/'.($post->user->avatar??'user_default.jpg')) }}"
         class="rounded-circle" style="width:40px;height:40px;">
        <!-- ↑アバター -->

          <div class="font-weight-lighter">
          {{ $post->created_at->format('Y/m/d  G:i') }} 
          </div>
        </div>
<!-- ここかな -->

        <!-- お気に入りアイコン↓ -->  
        <div class="">     
        @if(Auth::check())
        @if($post->favorites()->where('user_id', auth()->id())->count() == 0)
        <form method="post" action="{{ route('favorite.store', $post) }}">
            @csrf  
            <button class="clear-decoration">
            <i class="fas fa-bookmark fa-2x gray hover"></i>
          </button class="clear-decoration">
        </form>
        @endif
        <!-- 削除↓にifがくる -->
        @if($post->favorites()->where('user_id', auth()->id())->count())
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

      
        
        <h3 class="h4 card-title">
        <a href="{{ route('post.show', $post) }}" class="link-hover"
        >『{{ $post->title }}』</a>
        </h3>
        <div class="card-text">
          {{ Str::limit($post->body, 10) }}
        </div>

        
        <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3 rounded shadow">
                    <div class="px-2 pt-3">
                    @if ($post->comments->count())

                        <span class="text-dark badge badge-info">
                            返信 {{$post->comments->count()}}件
                        </span>
                    @else
                        <span>コメントはまだありません。</span>
                    @endif

                    </div>
                    <div class="px-4 pt-3"> 
                       <button type="button" class="btn btn-brown link-hover">
                          <a href="{{route('post.show', $post)}}" style="color:white;">コメントする</a>
                      </button> </div>
                </div>

      </div>

    </div>

@endforeach


<div class="d-flex justify-content-center">{{ $posts->links() }}</div>


@endsection

@section('script')

@include('layouts.script')

@endsection