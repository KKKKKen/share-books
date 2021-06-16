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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/post', 'PostController')->except(['index']);
// php artisan route:listで確認できる  ↑７つ

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index')->name('home');


// コメントの作成、編集、削除
Route::post('post/{post}/comment/store', 'CommentController@store')->name('comment.store');
Route::post('post/{post}/comment/edit', 'CommentController@edit')->name('comment.edit');


// Route::get('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');
// Route::post('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');
// Route::delete('post/{post}/comment/destroy', 'CommentController@destroy')->name('comment.destroy');

// param 
Route::delete('post/{post}/comment/{comment}/destroy', 'CommentController@destroy')->name('comment.destroy');
