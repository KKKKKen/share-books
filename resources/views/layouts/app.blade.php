<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Share Books</title>

<!-- おそらくbootstrap読み込む -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   
<!-- おそらくbootstrap読み込む -->

<!-- ↓forumの読み込み -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('css/forum.css') }}" rel="stylesheet"> -->
<!-- ↑forumの読み込み -->

<!-- ↓ material Bootstrapの読み込み -->
<!-- <link href="{{ asset('scripts.material') }}"> -->
<!-- ↑ material Bootstrapの読み込み -->

</head>



<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <header>

<!-- ナビバー -->
<nav class="navbar navbar-expand bg-brown fixed-top mb-3">
<div class="container-fluid">

  <a class="navbar-brand nav-hover" href="{{ route('home') }}"><i class="far fa-sticky-note mr-1"></i>Share Books</a>

  <ul class="navbar-nav ml-auto">
  @auth

    <img src="{{ asset('/storage/avatar/'.(auth()->user()->avatar ?? 'user_default.jpg') ) }}"
    class="rounded-circle" style="height:40px; width:40px;">

    


    <li class="nav-item">
    <a class="nav-link nav-hover" href="{{ route('profile.edit', auth()->id()) }}">{{ Auth::user()->name.'さん' }}</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link nav-hover" id="logout" href="#">ログアウト</a>
    </li>

    <li class="nav-item">
      <a class="nav-link nav-hover" href="{{ route('post.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
    </li>
  @endauth 
  @guest
    <li class="nav-item">
      <a class="nav-link nav-hover" href="{{ route('register') }}">ユーザー登録</a>
    </li>

    <li class="nav-item">
      <a class="nav-link nav-hover" href="{{ route('login') }}">ログイン</a>
    </li>
  @endguest

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>

  </ul>
</div>
</nav>


    </header>

<!-- 実験 -->

</body>


    <main class="py-4">
        <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 mb-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9 ">

            @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>

            @endif
                @yield('content')
            </div>
        </div>
        </div>
    

    </main>
</body>

@yield('script')

<script>
  document.getElementById('logout').addEventListener('click', function(){
    event.preventDefault();
    document.getElementById('logout-form').submit();
  });
</script>

</html>