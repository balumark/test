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

Route::get('/', 'Post\PostController@createPostIndex')->name('home');

/*
 *
 * Posts's route
 *
*/


Route::get('/post/create', 'Post\PostController@createPostIndex')->name('createPostIndex');
Route::post('/post/create/make', 'Post\PostController@makePost')->name('makePost');
Route::post('/post/update', 'Post\PostController@updatePost')->name('updatePost');
Route::get('post/{id}/edit', 'Post\PostController@editSinglePost')->name('getSinglePostEdit');

Route::get('/posts', 'Post\PostController@showPosts')->name('getPosts');
Route::get('/posts/edit', 'Post\PostController@editPosts')->name('getPostsEdit');
Route::get('/posts/{id}', 'Post\PostController@showSinglePost')->name('getSinglePost');



