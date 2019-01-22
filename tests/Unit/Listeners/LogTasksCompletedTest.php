<?php

use App\Log;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogTaskCompletedTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_task_completed_log_has_been_created()
    {
        // 1 Preparar
        $user = factory(User::class)->create();
        $task = Task::create([
            'name' => 'Comprar pa',
            'user_id' => $user->id
        ]);
        // Executar
//        event(new TaskUncompleted($task));

        $listener = new \App\Listeners\LogTaskCompleted();
        $listener->handle(new \App\Events\TaskCompleted($task));
        // 3 ASSERT
        // Test log is inserted
        $log  = Log::find(1);
        $this->assertEquals($log->text,"S'ha marcat com a completada la tasca 'Comprar pa'");
        $this->assertEquals($log->action_type,'completar');
        $this->assertEquals($log->module_type,'Tasques');
        $this->assertEquals($log->user_id,$user->id);
        $this->assertEquals($log->old_value,0);
        $this->assertEquals($log->new_value,true);
        $this->assertEquals($log->loggable_id,$task->id);
        $this->assertEquals($log->loggable_type,Task::class);
        $this->assertEquals($log->icon,'lock');
        $this->assertEquals($log->color,'primary');
    }
}