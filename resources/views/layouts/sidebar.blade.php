
<div class="list-group">
@php

@endphp

@if(Auth::check())

<!-- 検索バー -->
<form class="d-flex input-group w-auto mb-3 bg-light rounded opacity"
 action="{{route('search')}}">
      <input
        type="search"
        class="form-control rounded"
        placeholder="キーワードを入力してください"
        aria-label="Search"
        aria-describedby="search-addon"
        name="keyword"
        value="{{ request('keyword')  }}"
      />

      <div class="link-hover">
      <button class="btn btn-brown text-light float-right ">検索する</button>
      <!-- <input type="submit" value="検索" class="btn btn-brown"> -->
      </div>
      
</form>


<a href="{{ route('home') }}" class="list-group-item
{{ url()->current() == route('home') ? 'active-brown' : 'brown' }}
">
    <!-- <i> class="fas fa-home pr-2</i><span>一覧表示</span> -->
<span>一覧表示</span>
</a>

<a href="{{ route('post.create') }}" class="list-group-item
{{ url()->current() == route('post.create') ? 'active-brown' : 'brown' }}">
    <!-- <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span> -->
<span>新規投稿</span>
</a>

<a href="{{ route('home.myposts') }}" class="list-group-item
{{ url()->current() == route('home.myposts') ? 'active-brown' : 'brown' }}">
    <!-- <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span> -->
<span>自分の投稿</span>
</a>

<a href="{{ route('home.mycomments') }}" class="list-group-item
{{ url()->current() == route('home.mycomments') ? 'active-brown' : 'brown' }}">
    <!-- <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span> -->
<span>自分のコメント</span>
</a>

<a href="{{ route('home.myfavorites') }}" class="list-group-item
{{ url()->current() == route('home.myfavorites') ? 'active-brown' : 'brown' }}">
<span>お気に入り  </span><i class="fas fa-bookmark hover 
@if(auth()->user()->favorites()->count())
yellow
@else
gray
@endif
"></i>

</a>

@can('admin')
<a href="{{route('profile.index')}}" 
   class="list-group-item {{url()->current()==route('profile.index')?'active-brown':'brown'}}">
   <span>ユーザーアカウント</span>
   </a>
@endcan


<a href="{{ route('profile.edit', auth()->id() ) }}" class="list-group-item
{{ url()->current() == route('profile.edit', auth()->id() ) ? 'active-brown' : 'brown' }}">
    <!-- <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span> -->
<span>プロフィール編集</span>
</a>
@else

<div class="container login-info">
<div class="bg-brown m-8 text-light text-center">本共有サイト</div>
<div class="bg-brown m-8 text-light text-center text-bold">あなたのお気に入りの本をみんなにシェアしよう！</div>


</div>

@endif


</div>