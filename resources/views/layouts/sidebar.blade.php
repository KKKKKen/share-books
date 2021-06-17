
<div class="list-group">
@php

@endphp

{{ 'id'.auth()->id() }}
<a href="{{ route('home') }}" class="list-group-item
{{ url()->current() == route('home') ? 'active' : '' }}
">
    <!-- <i> class="fas fa-home pr-2</i><span>一覧表示</span> -->
<span>一覧表示</span>
</a>

<a href="{{ route('post.create') }}" class="list-group-item
{{ url()->current() == route('post.create') ? 'active' : '' }}">
    <!-- <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span> -->
<span>新規投稿</span>
</a>

<a href="{{ route('home.myposts') }}" class="list-group-item
{{ url()->current() == route('home.myposts') ? 'active' : '' }}">
    <!-- <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span> -->
<span>自分の投稿</span>
</a>

<a href="{{ route('home.mycomments') }}" class="list-group-item
{{ url()->current() == route('home.mycomments') ? 'active' : '' }}">
    <!-- <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span> -->
<span>自分のコメント</span>
</a>

</div>