<?php


use App\Log;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogTaskDestroyTest extends TestCase
{

    use RefreshDatabase;
        /**
         * @test
         */
        public function log_created_when_task_deleted()
    {
        $user = factory(User::class)->create();
        $task = factory(Task::class)->create();
        $listener = new \App\Listeners\LogTaskDestroy();
        $listener->handle(new \App\Events\TaskDelete($task, $user));
        $log  = Log::find(1);
        $this->assertEquals($log->text, "S'ha esborrat la tasca '" . $task->name . "' correctament.");
        $this->assertEquals($log->action_type, 'delete');
        $this->assertEquals($log->module_type, 'Tasques');
        $this->assertEquals($log->icon, "delete_sweep");
        $this->assertEquals($log->loggable_type, Task::class);
        $this->assertEquals($log->user_id, $user->id);
        $this->assertEquals($log->loggable_id, $task->id);
        $this->assertEquals($log->old_value, $task);
        $this->assertEquals($log->new_value, null);
    }
}