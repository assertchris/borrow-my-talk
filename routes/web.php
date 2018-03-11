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

Route::resource('topics', 'TopicsController')->middleware('auth');
Route::resource('topics.presentations', 'TopicPresentationsController')->middleware('auth');
Route::resource('topics.presentations.feedback', 'TopicPresentationFeedbackController')->middleware('auth');

Route::get('/settings', 'UsersController@settings')->middleware('auth')->name('users.settings');
Route::patch('/settings', 'UsersController@update')->middleware('auth')->name('users.update');

Route::get('/creator/{handle}', 'UsersController@profile')->name('users.profile');

Route::get('/topics/{topic}/report', 'ReportsController@show')->name('topics.reports.show');
Route::post('/topics/{topic}/report', 'ReportsController@send')->name('topics.reports.send');

Route::get('/search', 'TopicsController@search')->name('topics.search');
