<?php

namespace App\Listeners;

use App\Notifications\TaskStored;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTaskStoredNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $event->task->user->notify(new TaskStored($event->task));
    }
}