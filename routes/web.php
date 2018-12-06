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

// Public site
Route::get('/test', function() {
	phpinfo();
});
Route::get('/push-test', 'PagesController@test');

Route::get('/', 'PagesController@index');
Route::get('/tools', 'PagesController@tools');
Route::get('/community', 'PagesController@community');
Route::get('/recommended', 'PagesController@recommended');
Route::get('/contact', 'PagesController@contact');
Route::post('/contact/submit', 'PagesController@submit_contact');
Route::get('/blog', 'PagesController@blog');
Route::get('/books', 'PagesController@books');
Route::get('/profile', 'PagesController@profile');

// Admin backend site
Route::get('/admin', 'AdminController@login');
Route::post('/admin/login', 'AdminController@authenticate_user');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/recommend/new', 'AdminController@new_recommended');
Route::get('/admin/recommend/view', 'AdminController@view_recommended');
Route::get('/admin/posts/new', 'AdminController@new_blog_post');
Route::get('/admin/posts/view', 'AdminController@view_blog_posts');
Route::get('/admin/posts/edit/{post_id}', 'AdminController@edit_blog_post');

// Blog post functions
Route::post('/admin/posts/create', 'BlogController@create');
Route::post('/admin/posts/update', 'BlogController@update');
Route::post('/admin/posts/delete', 'BlogController@delete');

// Recommended functions
Route::post('/admin/recommend/create', 'RecommendedController@create');
Route::post('/admin/recommend/delete', 'RecommendedController@delete');

// Push notifications
Route::post('/push/subscribe', 'PushController@store');

// Blog
Route::get('/post/{post_id}/{slug}', 'BlogController@read');

// Members site
Route::get('/logout', 'MembersController@logout');

// Voting
Route::post('/vote/create', 'VotingController@create');

Auth::routes();
