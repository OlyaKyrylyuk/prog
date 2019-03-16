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
/*categories*/
Route::get('/', 'EntryController@index');//головна сторінка з всіма категоріями
Route::post('/categories/create','CategoryController@create');//додавання категорії
Route::get('categories/edit/{id}','CategoryController@editshow');//сторінка редагування категорії
Route::post('categories/edit/{id}','CategoryController@edit');//редагування категорії
Route::post('/categories/delete/{id}','CategoryController@delete');//видалення категорії
/*posts*/
Route::get('/posts','PostController@index');//виведення всіх постів
Route::post('/posts/add_post','PostController@form_add');
Route::get('/categories/posts/{id}','CategoryController@posts');//виведення постів по категоріях
Route::post('/posts/create','PostController@create');//додавання поста
Route::get('/posts/view/{id}','PostController@view');
Route::post('posts/delete/{id}','PostController@delete');
Route::post('posts/edit/{id}','PostController@editdata');
Route::get('posts/edit/{id}','PostController@edit');
/*comments*/
Route::post('comments/create','CommentController@create');
Route::post('comments_category/create','CommentsCategoryController@create');