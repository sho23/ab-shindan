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


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/terms', 'HomeController@terms')->name('home.terms');
Route::get('/privacy', 'HomeController@privacy')->name('home.privacy');
Route::resource('posts', 'PostsController');
Route::resource('questions', 'QuestionsController');
Route::resource('judgments', 'JudgmentsController');
Route::post('scores/store', 'ScoresController@store')->name('scores.store');
Route::get('posts/{post}/result/{score}', 'PostsController@result')->name('posts.result');
Route::get('questions/{post_id}/create', 'QuestionsController@create')->name('questions.create');

Route::get('/login/twitter', 'Auth\SocialController@getTwitterAuth');
Route::get('/login/twitter/callback', 'Auth\SocialController@getTwitterAuthCallback');
