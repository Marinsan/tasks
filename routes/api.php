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

Route::middleware('auth:api')->group(function() {

    Route::get('v1/tasks/','Api\TasksController@index');                // BROWSE
    Route::get('v1/tasks/{task}','Api\TasksController@show');           // READ
    Route::delete('v1/tasks/{task}','Api\TasksController@destroy');     // DELETE
    Route::post('v1/tasks/','Api\TasksController@store');              // CREATE
    Route::put('v1/tasks/{task}','Api\TasksController@update');           //EDIT

    Route::post('/v1/completed_task/{task}', 'Api\TasksCompletedController@store');
    Route::delete('/v1/completed_task/{task}', 'Api\TasksCompletedController@destroy');

    Route::get('v1/tags/','Api\TagsController@index');                // BROWSE
    Route::get('v1/tags/{tag}','Api\TagsController@show');           // READ
    Route::delete('v1/tags/{tag}','Api\TagsController@destroy');     // DELETE
    Route::post('v1/tags/','Api\TagsController@store');              // CREATE
    Route::put('v1/tags/{tag}','Api\TagsController@update');           //EDIT

    Route::get('/v1/user/tasks','Api\LoggedUserTasksController@index');
    Route::get('/v1/user/tasks/{task}','Api\LoggedUserTasksController@show');
    Route::put('/v1/user/tasks/{task}','Api\LoggedUserTasksController@update');
    Route::post('/v1/user/tasks/{task}','Api\LoggedUserTasksController@store');
    Route::delete('/v1/user/tasks/{task}','Api\LoggedUserTasksController@destroy');


    Route::get('/v1/user/tags','Api\LoggedUserTagsController@index');

});