<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('submit-info/read/{id}', 'InfoSubmitController@readed')->name('readed');
Route::get('comment/read/{id}', 'CommentController@readed');
Route::get('submit-info/notify', 'InfoSubmitController@unreadedNotify');
Route::post('comments','CommentController@store');
Route::post('contact', 'InfoSubmitController@registration');