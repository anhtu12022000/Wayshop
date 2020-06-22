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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Chat app sử dụng socket.io

Route::namespace('Frontend')->group(function () {
	Route::post('/login', 'AuthController@login');
	Route::get('/users/list', 'ChatController@usersList');
	Route::get('/auth/user/{auth_id}', 'ChatController@userAuth');
	Route::get('/chat/list/{sender_id}/{receiver_id}', 'ChatController@adminChatList');
	Route::get('/chat/list/{sender_id}', 'ChatController@userChatList');
	Route::post('/send/message', 'ChatController@sendMessage');
});

