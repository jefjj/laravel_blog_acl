<?php

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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('posts');


/*Route::middleware('auth:api')->get('/post/{id?}', 'PostsController@post')->name('post')->defaults('id', 0)->where('id', '[0-9]+');
Route::get('/posts/delete/{id}', 'PostsController@deletePost')->name('deletePost')->where('id', '[0-9]+');
Route::post('/posts/save', 'PostsController@savePost')->name('savePost');*/

Route::group([
    'middleware' => 'auth',
    'prefix' => 'posts',
], function (){
    Route::get('/new', 'PostsController@newPost')->name('newPost');
    Route::get('/update/{id}', 'PostsController@updatePost')->name('updatePost')->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'PostsController@deletePost')->name('deletePost')->where('id', '[0-9]+');
    Route::post('/save', 'PostsController@savePost')->name('savePost');
});
