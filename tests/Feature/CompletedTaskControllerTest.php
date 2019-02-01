<?php
namespace Test\Feature;
use App\Task;
use App\User;
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
        $this->withoutExceptionHandling();
        $this->login();
        $task= Task::create([
            'name' => 'comprar pa',
            'completed' => false
        ]);
        //2
        $response = $this->post('/taskscompleted/' . $task->id);

        $task = $task->fresh();
        $response->assertRedirect('/tasks');
        $response->assertStatus(302);
        $this->assertEquals($task->completed, true);
    }
    /**
     * @test
     */
    public function cannot_complete_a_unexisting_task()
    {
        $this->login();
        $response = $this->post('/taskscompleted/1');
        //3 Assert
        $response->assertStatus(404);
    }
    /**
     * @test
     */
    public function can_uncomplete_a_task()
    {

        $this->login();
        $task = Task::create([
            'name' => 'comprar pa',
            'completed' => true
        ]);
        //2
        $response = $this->delete('/taskscompleted/' . $task->id);
        //3 Dos opcions: 1) Comprovar base de dades directament
        // 2) comprovar canvis al objecte $task
        $task = $task->fresh();
        $response->assertRedirect('/');
        $response->assertStatus(302);
        $this->assertEquals((boolean)$task->completed, false);

    }
    /**
     * @test
     */
    public function cannot_uncomplete_a_unexisting_task()
    {
        // 1 -> no cal fer res
        // 2 Execute
        $response= $this->delete('/completed_task/1');
        //3 Assert
        $response->assertStatus(404);
    }

    public function login(): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

}