<?php

namespace Tests\Feature\Api;


use App\Task;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function can_complete_a_task()
    {
        $this->login('api');
        $task = Task::create([
            'name' => 'comprar pa',
            'completed' => false
        ]);

        $response = $this->json('POST', '/api/v1/completed_task/' . $task->id);
        $response->assertSuccessful();
        $task = $task->fresh();
        $this->assertEquals((boolean)$task->completed, true);
    }

    /**
     * @test
     */
    public function cannot_complete_a_unexisting_task()
    {
        $this->login('api');
        $response = $this->json('POST', '/api/v1/completed_task/1');
        //3 Assert
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function can_uncomplete_a_task()
    {
        $this->login('api');
        $this->withoutExceptionHandling();
        //1
        $task = Task::create([
            'name' => 'comprar pa',
            'completed' => true
        ]);
        //2
        $response = $this->json('DELETE', '/api/v1/completed_task/' . $task->id);
        $response->assertSuccessful();
        $task = $task->fresh();
        $this->assertEquals((boolean)$task->completed, false);
    }

    /**
     * @test
     */
    public function cannot_uncomplete_a_unexisting_task()
    {
        // 1 -> no cal fer res
        // 2 Execute
        $this->login('api');
        $response = $this->delete('/api/v1/completed_task/1');
        //3 Assert
        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function can_create_task()
    {
        $this->login('api');

        Gate::define('task.store',function ($user,$post){

        });

        $response = $this->json('POST','/api/v1/tasks/',[
            'name' => 'Comprar pa'
        ]);
        $result = json_decode($response->getContent());

        $response->assertSuccessful();
//        $this->assertDatabaseHas('tasks', [ 'name' => 'Comprar pa' ]);
        $this->assertNotNull($task = Task::find($result->id));
        $this->assertEquals('Comprar pa',$result->name);
        $this->assertFalse($result->completed);
    }
}