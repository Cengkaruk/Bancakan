<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
  'as' => 'questions.index',
  'uses' => 'QuestionController@index'
]);

Route::auth();

Route::get('/profile', [
  'as' => 'profiles.show',
  'uses' => 'ProfileController@show'
]);

Route::get('/profile/edit', [
  'as' => 'profiles.edit',
  'uses' => 'ProfileController@edit'
]);

Route::post('/profile', [
  'as' => 'profiles.store',
  'uses' => 'ProfileController@store'
]);

Route::get('/profile/password', [
  'as' => 'profiles.password',
  'uses' => 'ProfileController@editPassword'
]);

Route::post('/profile/password', [
  'as' => 'profiles.password.store',
  'uses' => 'ProfileController@storePassword'
]);

Route::get('/ask', [
  'as' => 'questions.ask',
  'uses' => 'QuestionController@ask'
]);

Route::get('/notification', [
  'as' => 'notifications',
  'uses' => 'NotifController@index'
]);

Route::get('/{slug}', [
  'as' => 'questions.show',
  'uses' => 'QuestionController@show'
]);
