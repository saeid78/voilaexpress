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
//Route for login
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::get('auth/logout', ['as' => 'logout', 'uses' =>  'Auth\LoginController@logout']);


//Route for registartion
Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('auth/register', 'Auth\RegisterController@register');

// Password reset routes
//Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ResetPasswordController@sendResetLinkEmail']);

//Route::get('password/reset/{token?}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');


/*
Route::get('password/reset/{token?}', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email','Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/

Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::resource('tags', 'TagController', ['except' => ['create']]);

//comment
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);



  Route::get('blog/{slug}', ['as' => 'blog.singlepost', 'uses' => 'BlogController@getSingle'])
  ->where('slug', '[\w\d\-\_]+'); // or where('slug', '@[\w\d\-\_]+');

  Route::get('about', 'PagesController@getAbout');


  Route::get('ecommerce', 'PagesController@getEcommerce');

  Route::get('blogs', 'BlogController@getIndex');

  //Route::get('blog', 'PagesController@getBlog');

  Route::get('popularposts', ['as' => 'blogs.popularposts', 'uses' => 'BlogController@getPopularposts']);

  Route::get('contact', 'PagesController@getContact');

  Route::post('contact', ['as' =>'contact.post', 'uses' =>'PagesController@postContact']);

  Route::get('project', 'PagesController@getProject');

  Route::get('/', 'PagesController@getIndex');

  Route::resource('posts', 'PostController');

 //Auth::routes();
