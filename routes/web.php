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

//
//Route::get('/about',function () {
//    return view('about');
//});
//
//Route::view('/contact', 'contact');
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
////Route::get('/prova','Provacontrolador@show');
//Route::get('/prova',function () {
//    $prova = 'dasjhdfasd';
//    dd($prova);
//});
//
//Route::redirect('/hola','/prova');
Route::get('/','TasksController@index')->name('tasks.index');
Route::get('/tasks','TasksController@index')->name('tasks.index');
Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
Route::post('/tasks', 'TasksController@store')->name('tasks.store');
Route::get('/tasks/edit/{id}', 'TasksController@edit')->name('tasks.edit');
Route::put('/tasks/edit/{id}', 'TasksController@update')->name('tasks.update');
Route::delete('/tasks/{id}', 'TasksControllEter@destroy')->name('tasks.delete');
Route::get('/people', 'People@index');
Route::get('/lessons', 'Lesson@index');

//// completed
//Route::post('/completed_tasks', 'CompletedTasksController');
//// uncompleted
//Route::delete('/completed_tasks', 'CompletedTasksController');