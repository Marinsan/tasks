<?php
namespace App\Listeners;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
class LogNotification implements ShouldQueue
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
        Log::debug('Nova notificació enviada');
        Log::debug('Notifiable' . json_encode($event->notifiable));
        Log::debug('Notification' . json_encode($event->notification));
        Log::debug('Channel' . json_encode($event->channel));
        Log::debug('Response' . json_encode($event->response));
    }
}
