<?php
namespace App\Listeners;
use App\Notifications\TaskUncompleted;
class SendTaskUncompletedNotification
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
        $event->task->user->notify(new TaskUncompleted($event->task));
    }
}
