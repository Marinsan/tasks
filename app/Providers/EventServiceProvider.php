<?php

namespace App\Providers;

use App\Events\TaskCompleted;
use App\Events\TaskDelete;
use App\Events\TaskStored;
use App\Events\TaskUncompleted;
use App\Events\TaskUpdate;
use App\Listeners\AddRolesToRegisterUser;
use App\Listeners\ForgetTasksCache;
use App\Listeners\LogNotification;
use App\Listeners\LogTaskCompleted;
use App\Listeners\LogTaskDestroy;
use App\Listeners\LogTaskStored;
use App\Listeners\LogTaskUncompleted;
use App\Listeners\LogTaskUpdated;
use App\Listeners\SendDatabaseNotificationStore;
use App\Listeners\SendMailTaskCompleted;
use App\Listeners\SendMailTaskDestroy;
use App\Listeners\SendMailTaskStored;
use App\Listeners\SendMailTaskUncompleted;
use App\Listeners\SendMailTaskUpdated;
use App\Listeners\SendTaskCompletedNotification;
use App\Listeners\SendTaskDeleteNotification;
use App\Listeners\SendTaskStoredNotification;
use App\Listeners\SendTaskUncompletedNotification;
use App\Listeners\SendTaskUpdateNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Notifications\Events\NotificationSent;

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
            ForgetTasksCache::class,
            SendTaskUncompletedNotification::class
        ],
        TaskCompleted::class => [
            LogTaskCompleted::class,
            SendMailTaskCompleted::class,
            ForgetTasksCache::class,
            SendTaskCompletedNotification::class
        ],
        TaskDelete::class => [
            LogTaskDestroy::class,
            SendMailTaskDestroy::class,
            ForgetTasksCache::class,
            SendTaskDeleteNotification::class
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
            ForgetTasksCache::class,
            SendTaskUpdateNotification::class
        ],
        NotificationSent::class => [
            LogNotification::class,
            SendDatabaseNotificationStore::class
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
