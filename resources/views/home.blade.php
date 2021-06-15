@extends('layouts.app')

@section('content')

@foreach($posts as $post)


    <div class="card mb-3 shadow">
      <div class="card-body d-flex flex-row">
        <i class="fas fa-user-circle fa-3x mr-1"></i>
        <div>
          <div class="font-weight-bold">
            {{ $post->user->name }}さん
          </div>
          <div class="font-weight-lighter">
            {{ $post->created_at }}
          </div>
        </div>
      </div>
      <div class="card-body pt-0 pb-2">
        <h3 class="h4 card-title">
        『{{ $post->title }}』
        </h3>
        <div class="card-text">
          {{ $post->body }}
        </div>
      </div>
    </div>
 
@endforeach
@endsection