<?php
namespace App\Listeners;
use App\Notifications\TaskCompleted;
class SendTaskCompletedNotification
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
        $event->task->user->notify(new TaskCompleted($event->task));
    }
}
