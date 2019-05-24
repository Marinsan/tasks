<?php

namespace App\Listeners;

use App\Events\Changelog;
use App\Log;
use App\Task;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class LogTaskCompleted implements ShouldQueue
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
        $log = Log::create([
            'text' => "S'ha marcat com a completada la tasca '" . $event->task->name . "'",
            'time' => Carbon::now(),
            'action_type'=> 'completar',
            'module_type' => 'Tasques',
            'icon' => 'lock',
            'color' => 'primary',
            'user_id' => Auth::user()->id,
            'loggable_id' => $event->task->id,
            'loggable_type' => Task::class,
            'old_value' => false,
            'new_value' => true
        ]);

        event(new Changelog($log, Auth::user()->map()));

    }
}
