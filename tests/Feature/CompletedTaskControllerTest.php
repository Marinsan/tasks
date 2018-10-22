<?php
namespace Test\Feature;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompletedTaskControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function can_complete_a_task()
    {
        //1
        $task =Task::create([
           'name' => 'Comprar pa',
           'completed' => false
        ]);

        $response=$this->post('/completed_task', $task->id);
        $task = $task->fresh();
        $response->assertRedirect('/task');
        $this->assertEquals($task->completed, true);

//        Route::post('/completed_tasks', 'CompletedTasksController');

//        Route::delete('/completed_tasks', 'CompletedTasksController');
    }
    /**
     * @test
     */
    public function cannot_complete_a_unexisting_task()
    {
        $this->post('/completed_task/50');
        $response->assertStatus(404);
    }
    /**
     * @test
     */
    public function can_uncomplete_a_task()
    {
        $task= Task::create([
            'name' => 'comprar pa',
            'completed' => true
        ]);
        //2
        $response = $this->delete('/tasks-uncompleted/' . $task->id);
        //3 Dos opcions: 1) Comprovar base de dades directament
        // 2) comprovar canvis al objecte $task
        $task = $task->fresh();
        $response->assertRedirect('/tasks');
        $this->assertEquals($task->completed,0);
    }
    /**
     * @test
     */
    public function can_uncomplete_a_unexisting_task()
    {
        // 1 -> no cal fer res
        // 2
        $response = $this->post('/completed_task/50');
        // 3
        $response->assertStatus(404);
    }

}