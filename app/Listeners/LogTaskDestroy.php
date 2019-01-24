<?php

namespace App\Listeners;

use App\Log;
use App\Task;
use Carbon\Carbon;

class LogTaskDestroy
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
        Log::create([
            'text' => "S'ha eliminat la tasca" . $event->task->name . "correctament",
            'time' => Carbon::now(),
            'action_type'=> 'eliminar',
            'module_type' => 'Tasques',
            'icon' => 'delete',
            'color' => 'error',
            'user_id' => $event->task->user_id,
            'loggable_id' => $event->task->id,
            'loggable_type' => Task::class,
            'old_value' => $event->task,
            'new_value' => null
        ]);
    }
}