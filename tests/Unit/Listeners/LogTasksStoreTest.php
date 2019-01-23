<?php

namespace Tests\Unit;

use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogTaskStoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function log_created_when_task_stored()
    {
        $task = factory(Task::class)->create();
        $user = factory(User::class)->create();
        $listener = new \App\Listeners\LogTaskStored();
        $listener->handle(new \App\Events\TaskStore($task, $user));
        $this->assertDatabaseHas('logs', [
            'text' => "La Tasca '$task->name' ha estat creada",
            'time' => Carbon::now(),
            'action_type' => 'store',
            'module_type' => 'Tasques',
            'icon' => 'add',
            'color' => 'green',
            'user_id' => $user->id,
            'loggable_id' => $task->id,
            'loggable_type' => Task::class,
            'old_value' => null,
            'new_value' => $task
        ]);
    }
}