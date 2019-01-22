<?php

namespace App\Listeners;

use App\Log;
use App\Task;
use Carbon\Carbon;

class LogTaskCompleted
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
            'text' => "S'ha marcat com a completada la tasca '" . $event->task->name . "'",
            'time' => Carbon::now(),
            'action_type'=> 'completar',
            'module_type' => 'Tasques',
            'icon' => 'lock',
            'color' => 'primary',
            'user_id' => $event->task->user_id,
            'loggable_id' => $event->task->id,
            'loggable_type' => Task::class,
            'old_value' => false,
            'new_value' => true
        ]);
    }
}