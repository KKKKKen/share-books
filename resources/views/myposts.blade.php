@extends('layouts.app')

@section('content')

@if(session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif


@foreach($posts as $post)


    <div class="card mb-3 shadow">
      <div class="card-body d-flex flex-row">
        <i class="fas fa-user-circle fa-3x mr-1"></i>
        <div>

          <div class="font-weight-bold">
          <img src="{{asset('storage/avatar/'.($post->user->avatar??'user_default.jpg'))}}"
          class="rounded-circle" style="width:40px;height:40px;">
            {{ $post->user->name }}さん
          
          </div>
          <div class="font-weight-lighter">
          {{ $post->created_at->format('Y/m/d  i:s') }} 
          </div>
        </div>
      </div>
      <div class="card-body pt-0 pb-2">
        
        <h3 class="h4 card-title">
        <a href="{{ route('post.show', $post) }}">『{{ $post->title }}』</a>
        </h3>
        <div class="card-text">
          {{ Str::limit($post->body, 10) }}
        </div>

        <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
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
                       <button type="button" class="btn btn-info">
                          <a href="{{route('post.show', $post)}}" style="color:white;">コメントする</a>
                      </button> </div>
                </div>

      </div>
    </div>
 
@endforeach

@if(count($posts) == 0)
<h4 class="text-center mt-3">まだ投稿していません。</h4>
@endif




@endsection