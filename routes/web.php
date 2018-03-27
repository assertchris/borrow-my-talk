<?php

Auth::routes();

Route::get('/', 'PageController@landing')->name('landing');
Route::get('/home', 'PageController@home')->name('home')->middleware('auth');

Route::resource('topics', 'TopicsController')->except("show")->middleware('auth');
Route::resource('topics.links', 'TopicLinksController')->middleware('auth');
Route::resource('topics.presentations', 'TopicPresentationsController')->middleware('auth');
Route::resource('topics.presentations.links', 'TopicPresentationLinksController')->middleware('auth');

Route::get('/settings', 'UsersController@settings')->middleware('auth')->name('users.settings');
Route::patch('/settings', 'UsersController@update')->middleware('auth')->name('users.update');

Route::get('/topics/{topic}/report', 'TopicReportsController@show')->name('topics.reports.show');
Route::post('/topics/{topic}/report', 'TopicReportsController@send')->name('topics.reports.send');
Route::get('/topics/{topic}/request', 'TopicRequestsController@show')->name('topics.requests.show');
Route::post('/topics/{topic}/request', 'TopicRequestsController@send')->name('topics.requests.send');
Route::get('/topics/{topic}/request/accept', 'TopicRequestsController@accept')->name('topics.requests.accept');
Route::post('/topics/{topic}/request/decline', 'TopicRequestsController@decline')->name('topics.requests.decline');

Route::get('/search', 'TopicsController@search')->name('topics.search');
Route::get('/topics/{topic}', 'TopicsController@show')->name('topics.show');

Route::get('/profile/{user}', 'UsersController@profile')->name('users.profile');
Route::get('/auth/twitter/redirect', 'UsersController@redirectToTwitter')->name('users.twitter.redirect');
Route::delete('/auth/twitter/disconnect', 'UsersController@disconnectTwitter')->name('users.twitter.disconnect');
Route::get('/auth/twitter', 'UsersController@handleTwitterCallback')->name('users.twitter.handle');
