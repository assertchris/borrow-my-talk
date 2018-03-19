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

Route::view('/', 'landing')->name('landing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('topics', 'TopicsController')->except("show")->middleware('auth');
Route::resource('topics.presentations', 'TopicPresentationsController')->middleware('auth');
Route::resource('topics.presentations.links', 'TopicPresentationLinksController')->middleware('auth');

Route::get('/settings', 'UsersController@settings')->middleware('auth')->name('users.settings');
Route::patch('/settings', 'UsersController@update')->middleware('auth')->name('users.update');

Route::get('/topics/{topic}/report', 'ReportsController@show')->name('topics.reports.show');
Route::post('/topics/{topic}/report', 'ReportsController@send')->name('topics.reports.send');

Route::get('/search', 'TopicsController@search')->name('topics.search');
Route::get('/topics/{topic}', 'TopicsController@show')->name('topics.show');

Route::get('/profile/{user}', 'UsersController@profile')->name('users.profile');
Route::get('/auth/twitter/redirect', 'UsersController@redirectToTwitter')->name('users.twitter.redirect');
Route::delete('/auth/twitter/disconnect', 'UsersController@disconnectTwitter')->name('users.twitter.disconnect');
Route::get('/auth/twitter', 'UsersController@handleTwitterCallback')->name('users.twitter.handle');
