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

Route::group(['middleware' => 'web'],function(){
    Route::GET('/category','categoryController@index');
    Route::GET('/create', 'categoryController@createCategory')->name('create');
    Route::GET('/store', 'categoryController@storeCategory')->name('store');
    Route::GET( '/blogdata','categoryController@blogData' )->name( 'blogName' );
    Route::GET( '/editblog', 'categoryController@editBlogData' )->name('editblog');
    Route::GET('/destory','categoryController@destory' );
    Route::GET('/post', 'postController@index');
    Route::GET('/create_post', 'postController@createPost')->name('create_post');
    Route::GET('blogpost/{id?}', 'postController@blogPost')->name('blogpost');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
