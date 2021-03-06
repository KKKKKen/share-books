<!-- 28行目要チェック -->

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 mt-6" >
        <div class="card-body rounded opacity" style="background-color:white;">
            <h1 class="mt4">新規投稿</h1>
            

            @if($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            @if(empty($errors->first('image')))
            <li>画像ファイルがあれば、再度、選択してください。</li>
            @endif
            </ul>
            </div>
            @endif

            <!-- 謎↓ -->
            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <!-- 謎↑ -->
    

            <form enctype="multipart/form-data"
            method="post" action="{{ route('post.store') }}"
            >
            @csrf
                <div class="form-group">
                    <label for="title">件名</label>
                    <input type="text" name="title" 
                    class="form-control" id="title" placeholder="Enter Title"
                    value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea name="body" class="form-control" 
                    id="body" cols="30" rows="10">{{old('body')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">画像（1MBまで） </label>
                    <div class="col-md-6">
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <button type="submit" class="text-light btn btn-brown mt-3">送信する </button>
            </form>
        </div>
    </div>
</div>
@endsection