<?php
namespace App\Listeners;
use App\Notifications\TaskUncompleted;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTaskUncompletedNotification implements ShouldQueue
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
