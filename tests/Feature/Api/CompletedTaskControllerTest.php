<?php

namespace Tests\Feature\Api;



use App\Events\TaskUncompleted;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class CompletedTaskControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function can_complete_a_task()
    {
        //1
        $this->loginAsTaskManager('api');
        $task = Task::create([
            'name' => 'comprar pa',
            'completed' => false
        ]);
        //2
        $response = $this->json('POST', '/api/v1/completed_task/' . $task->id);
        $response->assertSuccessful();
        //3 Dos opcions: 1) Comprovar base de dades directament
        // 2) comprovar canvis al objecte $task
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
        $this->loginAsSuperAdmin('api');
        $task= Task::create([
            'name' => 'comprar pa',
            'completed' => true
        ]);
        //2

        $response = $this->json('DELETE','/api/v1/completed_task/' . $task->id);
        $response->assertSuccessful();
        $task = $task->fresh();
        $this->assertEquals((boolean) $task->completed, false);

    }

    /**
     * @test
     */
    public function cannot_uncomplete_a_unexisting_task()
    {
        // 1
        $this->login('api');
        // 2 Execute
        $response = $this->delete('/api/v1/completed_task/598');
        //3 Assert
        $response->assertStatus(404);
    }
}