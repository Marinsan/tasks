<?php

use App\Http\Controllers\ChangelogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClockController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LoggedUserAvatarController;
use App\Http\Controllers\LoggedUserPhotoController;
use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PushSubscriptionController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\VerifyMobileController;
use App\Task;
use Illuminate\Support\Facades\Auth;

// Middleware
Auth::routes();
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
    Route::get('/tasques/{id}', 'TasquesController@show');

    Route::get('/home','TasquesController@index');
    Route::get('/','TasksController@index');

    Route::get('/features', '\\'. FeaturesController::class . '@index');

    // User Tasks
    Route::get('/user/tasks', 'LoggedUserTasksController@index');

    Route::impersonate();


    Route::get('/profile', '\\'. ProfileController::class . '@show');


    Route::post('/photo', '\\'. PhotoController::class . '@store');
    Route::get('/user/photo', '\\'. LoggedUserPhotoController::class . '@show');

    Route::post('/avatar', '\\'. AvatarController::class . '@store');
    Route::get('/user/avatar', '\\'. LoggedUserAvatarController::class . '@show');

    // Tags
    Route::get('/tags', 'TagsController@index');

    //ChangeLog
    Route::get('/changelog','\\'. ChangelogController::class . '@index');

    Route::get('/notifications', '\\' . NotificationController::class . '@index');

    //Newsletters
    Route::get('/newsletters', '\\' . NewslettersController::class . '@index');

    // Clock
    Route::get('/clock', '\\' . ClockController::class . '@index');

    Route::get('/chat', '\\' . ChatController::class . '@index');

    Route::get('/users', 'UsersController@index');

    Route::get('/games', 'GamesController@index');

    Route::get('/multimedia', 'MultimediaController@index');


    // Push Subscriptions
    Route::post('/subscriptions', '\\' . PushSubscriptionController::class . '@update');
    Route::post('/subscriptions/delete', '\\' . PushSubscriptionController::class . '@destroy');

    Route::get('/verificar_mobil','\\' . VerifyMobileController::class . '@index');
    Route::post('/verificar_mobil','\\' . VerifyMobileController::class . '@send');



});

Auth::routes(['verify' => true]);

Route::post('login_alt','Auth\LoginAltController@login');
Route::post('register_alt','Auth\RegisterAltController@register');

// Recuperacio de contrasneya

Route::get('/privacy', '\\'. PrivacyController::class . '@index');
Route::get('/terms', '\\'. TermsController::class . '@index');
Route::get('/info', '\\'. InfoController::class . '@index');
Route::get('/faq', '\\'. FaqController::class . '@index');




Route::get('/prova_cue', function() {
    \App\Jobs\SleepJob::dispatch();
});


Route::get('/', function () {
    return view('welcome');
});


Route::get('/auth/{provider}', '\\' . LoginController::class . '@redirectToProvider');
Route::get('/auth/{provider}/callback', '\\' . LoginController::class . '@handleProviderCallback');


//Route::get('/home', 'HomeController@index')->name('home');
// Manifest file (optional if VAPID is used)
Route::get('manifest.json', function () {
    return [
        'name' => config('app.name'),
        'gcm_sender_id' => config('webpush.gcm.sender_id')
    ];
});
