<?php

use App\Http\Controllers\Api\Changelog\ChangelogController;
use App\Http\Controllers\Api\GitController;
use App\Http\Controllers\Api\TasksTagsController;
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
    Route::post('/v1/completed_task/{task}', 'Api\TasksCompletedController@store'); // COMPLETE
    Route::delete('/v1/completed_task/{task}', 'Api\TasksCompletedController@destroy'); // UNCOMPLETE

    Route::get('v1/tags/','Api\TagsController@index');                // BROWSE
    Route::get('v1/tags/{tag}','Api\TagsController@show');           // READ
    Route::delete('v1/tags/{tag}','Api\TagsController@destroy');     // DELETE
    Route::post('v1/tags/','Api\TagsController@store');              // CREATE
    Route::put('v1/tags/{tag}','Api\TagsController@update');           //EDIT

    Route::get('/v1/user/tasks','Api\LoggedUserTasksController@index');
    Route::get('/v1/user/tasks/{task}','Api\LoggedUserTasksController@show');
    Route::put('/v1/user/tasks/{task}','Api\LoggedUserTasksController@update');
    Route::post('/v1/user/tasks/','Api\LoggedUserTasksController@store');
    Route::delete('/v1/user/tasks/{task}','Api\LoggedUserTasksController@destroy');
    Route::post('/v1/completed_task/{task}', 'Api\CompletedTasksController@store');
    Route::delete('/v1/completed_task/{task}', 'Api\CompletedTasksController@destroy');


    Route::get('v1/tasks/{task}/tags', '\\' . TasksTagsController::class . '@update');                // BROWSE


    // Users

    Route::get('/v1/users','Api\UsersController@index');
    Route::get('/v1/regular_users','Api\RegularUsersController@index');

    Route::get('/v1/git/info','\\' . GitController::class . '@index');

    //Changelog
    Route::get('/v1/changelog','\\' . ChangelogController::class . '@index');
//    Route::get('/v1/changelog/module/{module}','Tenant\Api\Changelog\ChangelogModuleController@index');
//    Route::get('/v1/changelog/user/{user}','Tenant\Api\Changelog\ChangelogUserController@index');
//    Route::get('/v1/changelog/loggable/{loggable}/{loggableId}','Tenant\Api\Changelog\ChangelogLoggableController@index');


});