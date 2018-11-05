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

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::post('login_alt','Auth\LoginAltController@login');
Route::post('register_alt','Auth\RegisterAltController@register');

// Middleware

//GRUP_DE_URLS_PER_USUARIS_AUTENTICATS
Route::middleware(['auth'])->group(function() {
    
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

    Route::get('/home','TasksVueController@index');
    Route::get('/tasks_vue', 'TasksVueController@index');
    Route::get('/tags_vue', 'TagsVueController@index');
});


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/tasks_vue', function:(){
//    echo 'hola';
//});


//// completed
//Route::post('/completed_tasks', 'CompletedTasksController');
//// uncompleted
//Route::delete('/completed_tasks', 'CompletedTasksController');