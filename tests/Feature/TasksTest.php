<?php

namespace Tests\Feature;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @test
     */
    public function can_show_tasks()
    {
        $this->withoutExceptionHandling();
        // 1 Prepare
        Task::create([
            'name' => 'comprar pa',
            'completed' => false
        ]);
        Task::create([
            'name' => 'comprar llet',
            'completed' => false
        ]);
        Task::create([
            'name' => 'Estudiar PHP',
            'completed' => false
        ]);

//        dd(Task::find(1));

        // 2 Executar
        $response = $this->get('/tasks');
        //dd($response);
        // 3 Comprovar
        $response->assertSuccessful();
        $response->assertSee('Tasques');
        $response->assertSee('comprar pa');
        $response->assertSee('comprar llet');
        $response->assertSee('Estudiar PHP');

        // comprovar que es veuen les tasques que ehi ha a la bd
    }

    /**
     * A basic test example.
     *
     * @test
     */

    public function can_store_task()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/tasks',[
            'name' => 'Comprar llet',
            'key' => 'value'
        ]);

        $response->assertStatus(302);
        $response->assertSuccessful();

        $this->assertDatabaseHas('tasks',['name' => 'Comprar llet']);

    }

    /**
     * A basic test example.
     *
     * @test
     */

    public function can_delete_task()
    {

        $this->withoutExceptionHandling();
        // 1
        $task = Task::create([
            'name' => 'Comprar llet'
        ]);
        // 2
        $response = $this->delete('/tasks/' . $task->id);

        // 3
        $response->assertStatus(302);
        $this->assertDatabaseMissing('tasks',['name' => 'Comprar llet']);

    }
    /**
     * A basic test example.
     *
     * @test
     */

    public function cannot_delete_an_unexisting_task()
    {
        $response = $this->delete('/tasks/1');
        $response->assertStatus(404);

    }
    /**
     * A basic test example.
     *
     * @test
     */

    public function cannot_edit_unexisting_task()
    {
        //TDD
       $response = $this->put('/tasks/1',[]);
       $response->$this->assertStatus(404);

    }

    public function can_edit_a_tasl()
    {
        Task::create([
            'name' => 'dasdad',
            'completed' => true
        ]);

        $response = $this->put('/tasks/', $task->id,$newTask=[
           'name' => 'Comprar pa',
           'completed' => true
        ]);
        $response->assertSuccessful();
        $this->assertDatabaseHas('tasks',$newTask);

        $task = $task->fresh();
        $this->assertEquals($task->name,'comprar pa');
        $this->assertEquals($task->completed,true);

    }
}
