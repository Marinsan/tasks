<?php
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::post('login_alt','Auth\LoginAltController@login');
Route::post('register_alt','Auth\RegisterAltController@register');

// Middleware

//GRUP_DE_URLS_PER_USUARIS_AUTENTICATS
Route::middleware('auth')->group(function() {

    Route::get('/tasks','TasksController@index')->name('tasks.index');
    Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
    Route::post('/tasks', 'TasksController@store')->name('tasks.store');
    Route::get('/tasks/edit/{id}', 'TasksController@edit')->name('tasks.edit');
    Route::put('/tasks/edit/{id}', 'TasksController@update')->name('tasks.update');
    Route::delete('/tasks/{id}', 'TasksController@destroy')->name('tasks.delete');

    Route::post('/taskscompleted/{task}', 'TasksCompletedController@store');
    Route::delete('/taskscompleted/{task}', 'TasksCompletedController@destroy');

    Route::get('/contact', 'Contact@index');
    Route::get('/about', 'About@index');

    Route::get('/tasks_vue', 'TasksVueController@index');
    Route::get('/tasques', 'TasquesController@index');

    Route::get('/home','TasquesController@index');
    Route::get('/','TasksController@index');

    // User Tasks
    Route::get('/user/tasks', 'LoggedUserTasksController@index');

    Route::impersonate();


    // Tags
    Route::get('/tags', 'TagsController@index');

});



Route::get('/', function () {
    return view('welcome');
});
