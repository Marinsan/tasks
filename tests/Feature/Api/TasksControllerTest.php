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

    public function regular_user_cannot_show_a_task()
    {
        $this->login('api');
        // 1
        $task = factory(Task::class)->create();
        // 2
        $response = $this->json('GET','/api/v1/tasks/' . $task->id);
        // 3
        $result = json_decode($response->getContent());
        $response->assertSuccessful();
        $this->assertEquals($task->name, $result->name);
        $this->assertEquals($task->completed, (boolean) $result->completed);
    }

    /**
     * @test
     */

    public function task_manager_can_show_a_task()
    {

        initialize_roles();
        $user = $this->login('api');
        $user->assignRole('TasksManager');
        $task = factory(Task::class)->create();
        // 2
        $response = $this->json('GET','/api/v1/tasks/' . $task->id);
        // 3
        $result = json_decode($response->getContent());
        $response->assertSuccessful();
        $this->assertEquals($task->name, $result->name);
        $this->assertEquals($task->completed, (boolean) $result->completed);
    }

    /**
     * @test
     */

    public function superadmin_can_show_a_task()
    {
        $user = $this->login('api');
        $user->admin=true;
        $user->save();
        // 1
        $task = factory(Task::class)->create();
        // 2
        $response = $this->json('GET','/api/v1/tasks/' . $task->id);
        // 3
        $result = json_decode($response->getContent());
        $response->assertSuccessful();
        $this->assertEquals($task->name, $result->name);
        $this->assertEquals($task->completed, (boolean) $result->completed);
    }


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