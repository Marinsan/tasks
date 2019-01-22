<?php

namespace App\Providers;

use App\Events\TaskCompleted;
use App\Events\TaskDestroy;
use App\Events\TaskUncompleted;
use App\Listeners\AddRolesToRegisterUser;
use App\Listeners\LogTaskCompleted;
use App\Listeners\LogTaskDestroy;
use App\Listeners\LogTaskUncompleted;
use App\Listeners\SendMailTaskCompleted;
use App\Listeners\SendMailTaskDestroy;
use App\Listeners\SendMailTaskUncompleted;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            AddRolesToRegisterUser::class,
        ],
        TaskUncompleted::class => [
            LogTaskUncompleted::class,
            SendMailTaskUncompleted::class
        ],
        TaskCompleted::class => [
            LogTaskCompleted::class,
            SendMailTaskCompleted::class
        ],
        TaskDestroy::class => [
            LogTaskDestroy::class,
            SendMailTaskDestroy::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
