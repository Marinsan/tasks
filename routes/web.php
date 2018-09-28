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

Route::get('/tasks','TasksController@index');
Route::post('/tasks','TasksController@store');
Route::delete('/tasks/{id}','TasksController@destroy');


Route::get('/about',function () {
    return view('about');
});

Route::view('/contact', 'contact');

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/prova','Provacontrolador@show');
Route::get('/prova',function () {
    $prova = 'dasjhdfasd';
    dd($prova);
});

Route::redirect('/hola','/prova');