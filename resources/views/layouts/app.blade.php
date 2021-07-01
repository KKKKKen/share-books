<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
<!-- vue.js実験 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- vue.js実験 -->

<!-- アイコン読み込み-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

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
<nav class="navbar navbar-expand bg-brown opacity fixed-top mb-3">
<div class="container-fluid">

  <a class="navbar-brand nav-hover" href="{{ route('home') }}"><i class="fas fa-book-open"></i> Share Books</a>
<!-- classにfar fa-sticky-note mr-1  ↑ -->

  <ul class="navbar-nav ml-auto">
  @auth
    <img src="{{ asset('/storage/avatar/'.(auth()->user()->avatar ?? 'user_default.jpg') ) }}"
    class="rounded-circle" style="height:40px; width:40px;">

    <!-- dropdown -->
    <li class="nav-item dropdown d-block d-sm-none">
          <a class="nav-link nav-hover dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            
    <li class="nav-item">
    <a class="nav-link dropdown-item" href="{{ route('profile.edit', auth()->id()) }}">{{ Auth::user()->name }}</a>
    </li>
   <!-- ログアウトなぜできる -->
    <li class="nav-item">
      <a class="nav-link dropdown-item" id="logout" name="logout" href="k">ログアウト</a>
    </li>


    <li class="nav-item">
      <a class="nav-link dropdown-item" href="{{ route('post.create') }}">投稿する</a>
    </li>
    <!-- ↑dropdown -->


    </ul>
    </li>

    <li class="nav-item d-none d-sm-block">
    <a class="nav-link nav-hover" href="{{ route('profile.edit', auth()->id()) }}">{{ Auth::user()->name }}</a>
    </li>
   
    <li class="nav-item d-none d-sm-block">
      <!-- なぜできない？ -->
      <a class="nav-link nav-hover" id="logout2" href="#">ログアウト</a>
      <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
    </li>

    <li class="nav-item d-none d-sm-block">
      <a class="nav-link nav-hover" href="{{ route('post.create') }}">投稿する</a>
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
  <!-- ↓に置くとlogout-form2は効かない -->
  <!-- <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;"> -->
    @csrf
  </form>

  </ul>
</div>
</nav>
<!-- ナビバー修了 -->

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

                <div id="app">
                @yield('content')
                </div>


                <script src="{{ mix('js/app.js') }}"></script>
                <!-- jquery -->
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  

            </div>
        </div>
        </div>
    

    </main>
</body>

@yield('script')

<script>
  // s入れてみる
  document.getElementById('logout').addEventListener('click', function(){
    event.preventDefault();
    document.getElementById('logout-form').submit();
  });
  document.getElementById('logout2').addEventListener('click', function(){
    event.preventDefault();
    document.getElementById('logout-form2').submit();
  });

  function sendPost(event) {
  event.preventDefault();
  var form = document.createElement('form');
  form.action = event.target.href;
  form.method = 'post';
  document.body.appendChild(form);
  form.submit();
}
</script>

</html>