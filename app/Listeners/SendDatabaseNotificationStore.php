<?php
namespace App\Listeners;
use App\Notifications\DatabaseNotificationStore;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
class SendDatabaseNotificationStore
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
        if ($event->channel == 'database') {
            $event->notifiable->notify(new DatabaseNotificationStore($event->notification));
        }
    }
}