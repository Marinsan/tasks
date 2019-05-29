<?php
namespace App\Listeners;
use App\Notifications\TaskDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTaskDeleteNotification implements ShouldQueue
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
        $event->user->notify(new TaskDeleted($event->task));
    }
}
