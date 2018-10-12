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
Route::get('/', 'PagesController@index')->name('Front page of website');
Route::get('/tools', 'PagesController@tools');
Route::get('/community', 'PagesController@community');
Route::get('/recommended', 'PagesController@recommended');
Route::get('/contact', 'PagesController@contact');
Route::get('/blog', 'PagesController@blog');
Route::get('/books', 'PagesController@books');

// Blog
Route::get('/post/{post_id}/{slug}', 'BlogController@read');
Route::get('/post/new', 'BlogController@new');
Route::post('/post/create', 'BlogController@create');

// Members site
Route::get('/logout', 'MembersController@logout');

// Voting
Route::post('/vote/create', 'VotingController@create');

Auth::routes();
