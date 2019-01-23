<?php

namespace App\Listeners;

use App\Mail\TaskDeleted;
use Illuminate\Support\Facades\Mail;

class SendMailTaskDestroy
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
        $subject = $event->task->subject();
        Mail::to($event->task->user)
            ->cc(config('tasks.manager_email'))
            ->send((new TaskDeleted($event->task))->subject($subject));
    }
}