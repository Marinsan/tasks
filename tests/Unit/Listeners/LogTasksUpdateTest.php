<?php

namespace Tests\Unit;

use App\Events\TaskUpdate;
use App\Listeners\LogTaskUpdated;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogTasksUpdateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function log_created_when_task_stored()
    {
        $task = factory(Task::class)->create();
        $task->name = 'Comprar pa';
        $task->save();
        $task_old = $task;
        $user = factory(User::class)->create();
        $listener = new LogTaskUpdated();
        $listener->handle(new TaskUpdate($task_old, $task, $user));
        $this->assertDatabaseHas('logs', [
            'text' => "La Tasca '$task->name' ha estat actualitzada",
            'time' => Carbon::now(),
            'action_type' => 'update',
            'module_type' => 'Tasques',
            'icon' => 'edit',
            'color' => 'orange',
            'user_id' => $user->id,
            'loggable_id' => $task->id,
            'loggable_type' => Task::class,
            'old_value' => $task_old,
            'new_value' => $task
        ]);
    }
}