<?php
// 23行目::class

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;

Route::middleware('auth')->group(function(){
    
    Route::resource('/post', 'PostController')->except(['index']);
    // php artisan route:listで確認できる  ↑７つ
    
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // 全投稿一覧
    Route::get('/', 'HomeController@index')->name('home');
    
    // 自分の投稿一覧
    Route::get('/mypost', 'HomeController@myposts')->name('home.myposts');
    
    // コメント一覧
    Route::get('mycomment','HomeController@mycomments')->name('home.mycomments');
    

    // アカウント編集
    Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile/{user}/update', 'ProfileController@update')->name('profile.update');

    // 管理者画面
    Route::middleware(['can:admin'])->group(function(){
        Route::get('/profile/index', 'ProfileController@index')->name('profile.index');
    });
    

    // コメントの作成、編集、削除
    Route::post('post/{post}/comment/store', 'CommentController@store')->name('comment.store');
    Route::post('post/{post}/comment/edit', 'CommentController@edit')->name('comment.edit');
    
    
    // Route::get('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');
    // Route::post('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');
    // Route::delete('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');
    
    // param 
    Route::delete('post/{post}/comment/{comment}/destroy', 'CommentController@destroy')->name('comment.destroy');
    

});



Auth::routes();