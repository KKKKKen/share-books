@extends('layouts.app')
@section('content')


@if(session('message'))
<div class="col-8 mx-auto alert alert-success">{{session('message')}}</div>
@endif


@if ($errors->any())
<div class="col-8 mx-auto alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container ml-auto col-12 col-md-10 col-lg-8 rounded shadow" style="background-color:white; opacity:98%;">
    <div class="row">
        <div class="col-md-10 mt-6 mx-auto">
            <div class="card-body">
                <h1 class="mt4">プロフィール編集</h1>
                <form method="post" action="{{route('profile.update', $user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">お名前</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')??$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{old('email')??$user->email}}">
                    </div>


                    <!-- 画像 -->
                    <!-- 画像の表示↓ -->
                    <div class="form-group">
                        <label for="avatar">アバター変更（サイズは1MBまで）</label>
                        <img src="{{asset('storage/avatar/'.($user->avatar??'user_default.jpg') )}}"
                        class="d-block rounded-circle mb-3" style="height:100px;width:100px;">
                       <!-- 画像をアップロードするための欄↓ -->
                        <div>
                            <input id="avatar" type="file" name="avatar">
                        </div>
                    </div>

                    <!-- 画像 -->


                    <div class="form-group">
                        <label for="password">パスワード(8文字以上）</label>
                        <input id="password" type="password" 
                        class="form-control" name="password" placeholder="パスワードを入力してください" 
                        required autocomplete="new-password">

                    </div>

                    <div class="form-group">
                        <label for="password">パスワード再入力</label>
                        <input id="password-confirm" type="password" class="form-control" 
                        name="password_confirmation" placeholder="パスワードを再入力してください" 
                        required autocomplete="new-password">
                    </div>

                    <button type=”submit” class="btn btn-brown text-light mt-3 link-hover">送信する</button>
                </form>

                <!-- 権限付与 -->
                @can('admin')
                <div class="mt-5">
                    <h4 class="mb-3">役割付与・削除（アドミンユーザーにのみ表示）</h4>
                    <table class="table border">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col-4" width="30%">役割</th>
                                <th scope="col-4" width="40%">付与/削除</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>
                             
                                    {{$role->name}}
                                </td>
                                <td>
                                    @if(!$user->roles->contains($role))
                                    <form method="post" action="{{route('role.attach', $user)}}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        <button class="btn btn-primary">ロール追加</button>
                                    </form>
                                    @endif



                                    @if($user->roles->contains($role))
                                    <form method="post" action="{{route('role.detach', $user)}}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="role" value="{{$role->id}}">

                                        @if(!($role->name == 'admin' && $user->id == auth()->id()))
                                        <button class="btn btn-danger">ロール削除</button>
                                        @endif
                                        
                                    </form>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @endcan


            </div>
        </div>      
    </div>
</div>


@endsection


