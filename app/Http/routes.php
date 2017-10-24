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
Route::group(['middleware' => ['web']], function () {
Route::get('agent/{workerSid}','AgentController@index');

Route::get('token','ClientController@token');
Route::post('voice','ClientController@voice');

Route::get('client','ClientController@index');
Route::get('test','ClientController@test');



Route::get('call','ClientController@haha');


Route::get('test','CreateTask@test');

Route::get('create-task','CreateTask@creatTask');

Route::get('incoming-call','IncomingCallController@Call');

Route::post('enqueue-call','EnqueueCallController@enqueueCall');
Route::post('task-assignment','CallBackController@taskAssignment');


});