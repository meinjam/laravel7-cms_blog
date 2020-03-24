<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('category', 'CategoryController');

    Route::get('/posts', 'PostController@index')->name('all.posts');
    Route::get('/posts/create', 'PostController@create')->name('create.post');
    Route::post('/posts/store', 'PostController@store')->name('store.post');
    Route::get('/posts/trashed', 'PostController@trashed')->name('trashed.post');
    Route::get('/posts/{post}', 'PostController@show')->name('show.post');
    Route::get('/posts/{post}/delete', 'PostController@destroy')->name('delete.post');
    Route::get('/posts/{post}/restore', 'PostController@restore')->name('post.restore');
    Route::delete('/posts/{post}/kill', 'PostController@kill')->name('delete.kill');
    Route::get('/posts/{post}/edit', 'PostController@edit')->name('edit.post');
    Route::post('/posts/{post}/update', 'PostController@update')->name('update.post');

    Route::get('/tags', 'TagController@index')->name('all.tags');
    Route::get('/tags/create', 'TagController@create')->name('create.tag');
    Route::post('/tags/store', 'TagController@store')->name('store.tag');
    Route::get('/tags/{id}/delete', 'TagController@destroy')->name('delete.tag');
    Route::get('/tags/{id}/edit', 'TagController@edit')->name('edit.tag');
    Route::post('/tags/{id}/update', 'TagController@update')->name('update.tag');
});

// 
// Route::get('/posts', 'PostController@')->name('');
// Route::get('/posts', 'PostController@')->name('');
// Route::get('/posts', 'PostController@')->name('');
// Route::get('/posts', 'PostController@')->name('');

// Route::get('/posts', 'PostController@')->name('');
