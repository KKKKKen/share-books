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
use App\Http\Controllers\SearchController;

Route::middleware('auth')->group(function(){
    
    Route::resource('/post', 'PostController')
    // ->except(['index'])
    ;
    // php artisan route:listで確認できる  ↑７つ
    
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // 全投稿一覧
    Route::get('/', 'HomeController@index')->name('home');
    
    // 自分の投稿一覧
    Route::get('/mypost', 'HomeController@myposts')->name('home.myposts');
    
    // コメント一覧
    Route::get('mycomment','HomeController@mycomments')->name('home.mycomments');
    
    // お気に入り一覧 kkkkkkkkkkkkkkkkkkkkkkkkkkkkk
    Route::get('myfavorite', 'HomeController@myfavorites')->name('home.myfavorites');

    // アカウント編集
    Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile/{user}/update', 'ProfileController@update')->name('profile.update');

    // 管理者画面
    Route::middleware(['can:admin'])->group(function(){
        Route::get('/profile/index', 'ProfileController@index')->name('profile.index');
        Route::delete('/profile/{user}/destroy', 'ProfileController@destroy')->name('profile.destroy');
        Route::put('/profile/{user}/attach', 'RoleController@attach')->name('role.attach');
        Route::put('/profile/{user}/detach', 'RoleController@detach')->name('role.detach');
    });
    
    // 検索バー
    Route::get('/search', 'SearchController@search')->name('search');

    // コメントの作成、編集、削除
    Route::post('post/{post}/comment/store', 'CommentController@store')->name('comment.store');
    Route::post('post/{post}/comment/edit', 'CommentController@edit')->name('comment.edit');
    
    // お気に入り
    Route::post('post/{post}/favorite', 'FavoriteController@store')->name('favorite.store');
    Route::delete('post/{post}/unfavorite', 'FavoriteController@destroy')->name('favorite.destroy');
    

    // Route::get('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');
    // Route::post('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');
    // Route::delete('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');
    
    // param 
    Route::delete('post/{post}/comment/{comment}/destroy', 'CommentController@destroy')->name('comment.destroy');
    // Route::delete('post/{post}/comment/{id}/destroy', 'CommentController@destroy')->name('comment.destroy');
    

});



Auth::routes();