<?php

namespace App\Providers;

use App\Events\TaskCompleted;
use App\Events\TaskDelete;
use App\Events\TaskStored;
use App\Events\TaskUncompleted;
use App\Events\TaskUpdate;
use App\Listeners\AddRolesToRegisterUser;
use App\Listeners\ForgetTasksCache;
use App\Listeners\LogTaskCompleted;
use App\Listeners\LogTaskDestroy;
use App\Listeners\LogTaskStored;
use App\Listeners\LogTaskUncompleted;
use App\Listeners\LogTaskUpdated;
use App\Listeners\SendMailTaskCompleted;
use App\Listeners\SendMailTaskDestroy;
use App\Listeners\SendMailTaskStored;
use App\Listeners\SendMailTaskUncompleted;
use App\Listeners\SendMailTaskUpdated;
use App\Listeners\SendTaskStoredNotification;
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
            SendMailTaskUncompleted::class,
            ForgetTasksCache::class
        ],
        TaskCompleted::class => [
            LogTaskCompleted::class,
            SendMailTaskCompleted::class,
            ForgetTasksCache::class
        ],
        TaskDelete::class => [
            LogTaskDestroy::class,
            SendMailTaskDestroy::class,
            ForgetTasksCache::class
        ],
        TaskStored::class => [
            LogTaskStored::class,
            SendMailTaskStored::class,
            ForgetTasksCache::class,
            SendTaskStoredNotification::class
        ],
        TaskUpdate::class => [
            LogTaskUpdated::class,
            SendMailTaskUpdated::class,
            ForgetTasksCache::class
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
