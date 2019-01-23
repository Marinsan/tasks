<?php

namespace App\Listeners;

use App\Log;
use App\Task;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogTaskUpdated
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
            'text' => "La Tasca '".$event->task->name."' ha estat actualitzada",
            'time' => Carbon::now(),
            'action_type' => 'update',
            'module_type' => 'Tasques',
            'icon' => 'edit',
            'color' => 'orange',
            'user_id' => $event->user->id,
            'loggable_id' => $event->task->id,
            'loggable_type' => Task::class,
            'old_value' => $event->old_task,
            'new_value' => $event->task
        ]);
    }
}
