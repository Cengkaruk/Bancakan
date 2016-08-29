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

Route::group(['middleware' => ['auth']], function () {

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

  Route::post('/ask', [
    'as' => 'questions.ask.store',
    'uses' => 'QuestionController@storeAsk'
  ]);

  Route::get('/notification', [
    'as' => 'notifications',
    'uses' => 'NotifController@index'
  ]);

  Route::get('/{slug}/report', [
    'as' => 'questions.report',
    'uses' => 'QuestionController@report'
  ]);

  Route::get('/{slug}/vote', [
    'as' => 'questions.vote',
    'uses' => 'QuestionController@vote'
  ]);

  Route::get('/{slug}/delete', [
    'as' => 'questions.delete',
    'uses' => 'QuestionController@delete'
  ]);

  Route::post('/{slug}/answer', [
    'as' => 'answers.store',
    'uses' => 'AnswerController@store'
  ]);

  Route::get('/{slug}/answer/{id}/delete', [
    'as' => 'answers.delete',
    'uses' => 'AnswerController@delete'
  ]);

  Route::get('/{slug}/answer/{id}/vote', [
    'as' => 'answers.vote',
    'uses' => 'AnswerController@vote'
  ]);

  Route::get('/{slug}/answer/{id}/report', [
    'as' => 'answers.report',
    'uses' => 'AnswerController@report'
  ]);

  Route::post('/{slug}/answer/{id}/reply', [
    'as' => 'answers.reply',
    'uses' => 'ReplyController@reply'
  ]);

  Route::get('/{slug}/answer/{answer_id}/delete/{reply_id}', [
    'as' => 'replies.delete',
    'uses' => 'ReplyController@delete'
  ]);

  Route::get('/{slug}/answer/{answer_id}/report/{reply_id}', [
    'as' => 'replies.report',
    'uses' => 'ReplyController@report'
  ]);

  Route::post('/{slug}/answer/{answer_id}/reply/{reply_id}', [
    'as' => 'replies.reply',
    'uses' => 'ReplyController@replyToReply'
  ]);

});

Route::get('/{slug}', [
  'as' => 'questions.show',
  'uses' => 'QuestionController@show'
]);

Route::get('/profile/{username}', [
  'as' => 'profiles.show.others',
  'uses' => 'ProfileController@show'
]);
