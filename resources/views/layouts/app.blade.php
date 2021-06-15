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
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
<!-- <link href="{{ asset('css/forum.css') }}" rel="stylesheet"> -->
<!-- ↑forumの読み込み -->

<!-- ↓ material Bootstrapの読み込み -->
<!-- <link href="{{ asset('scripts.material') }}"> -->
<!-- ↑ material Bootstrapの読み込み -->

</head>


<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<header>
<nav class="navbar navbar-expand bg-info">
<div class="container-fluid">

  <a class="navbar-brand" href="{{ route('home') }}"><i class="far fa-sticky-note mr-1"></i>Share Books</a>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="">ユーザー登録</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="">ログイン</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href=""><i class="fas fa-pen mr-1"></i>投稿する</a>
    </li>
  </ul>
</div>
</nav>
</header>


<!-- 実験 -->


  {{--略--}}

</body>


    <main class="py-4">
        <div class="container">
        <div class="row">
        <!-- col-lg-3 -->
        <!-- col-md-4 -->
            <div class="col-12 col-md-3 mb-3">
                @include('layouts.sidebar')
            </div>
            <!-- <div class="col-12 col-md-8 col-lg-9"></div> -->
         <!-- ↓投稿　 -->
            <div class="col-12 col-md-9">
                @yield('content')
            </div>
        </div>
        </div>
    

    </main>
</body>

</html>