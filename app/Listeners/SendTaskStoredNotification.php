<?php


namespace App\Listeners;


use Illuminate\Contracts\Queue\ShouldQueue;

class SendTaskStoredNotification implements ShouldQueue
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

        Notify::send($user);
        $user->notify();
    }
}